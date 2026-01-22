<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Services\EnrollmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __construct(private readonly EnrollmentService $enrollmentService)
    {
    }

    public function confirm(Request $request): JsonResponse
    {
        $student = $request->user('student');

        if (!$student) {
            return response()->json(['message' => 'Vui lòng đăng nhập để mua khóa học.'], 401);
        }

        $data = $request->validate([
            'course_id' => ['required', 'integer', 'exists:courses,id'],
            'amount' => ['required', 'numeric', 'min:0'],
            'payment_note' => ['nullable', 'string', 'max:255'],
            'transaction_id' => ['nullable', 'string', 'max:255'],
            'provider' => ['nullable', 'string', 'max:100'],
            'method' => ['nullable', 'string', 'max:100'],
        ]);

        $course = Course::where('status', 'published')->findOrFail($data['course_id']);
        $basePrice = (float) ($course->price ?? 0);
        $salePrice = (float) ($course->sale_price ?? $basePrice);
        $effectivePrice = max(0, $salePrice);
        $discountValue = max(0, $basePrice - $effectivePrice);
        $paidAmount = $course->isFree() ? 0 : (float) $data['amount'];

        if ($student->hasCourseAccess($course)) {
            return response()->json([
                'message' => 'Bạn đã sở hữu khóa học này.',
                'status' => 'already-owned',
            ]);
        }

        $order = DB::transaction(function () use (
            $student,
            $course,
            $effectivePrice,
            $discountValue,
            $data,
            $paidAmount
        ) {
            $order = Order::create([
                'student_id' => $student->id,
                'subtotal' => $effectivePrice + $discountValue,
                'discount_total' => $discountValue,
                'total' => $effectivePrice,
                'status' => 'completed',
                'payment_status' => 'paid',
                'paid_at' => now(),
                'notes' => $data['payment_note'] ?? null,
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'course_id' => $course->id,
                'quantity' => 1,
                'price' => $effectivePrice,
                'subtotal' => $effectivePrice,
            ]);

            Payment::create([
                'order_id' => $order->id,
                'amount' => $paidAmount > 0 ? $paidAmount : $effectivePrice,
                'provider' => $data['provider'] ?? 'manual',
                'method' => $data['method'] ?? 'bank_transfer',
                'status' => 'succeeded',
                'transaction_id' => $data['transaction_id'] ?? null,
                'paid_at' => now(),
                'meta' => [
                    'payment_note' => $data['payment_note'] ?? null,
                ],
            ]);

            $this->enrollmentService->grantCourse($student, $course, 'order');

            return $order;
        });

        $student->forgetCourseAccessCache();

        return response()->json([
            'message' => 'Đã ghi nhận thanh toán và mở quyền truy cập.',
            'order_id' => $order->id,
            'course_id' => $course->id,
            'status' => 'granted',
        ], 201);
    }
}
