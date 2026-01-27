<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['student', 'items.course'])->latest();

        if ($paymentStatus = trim((string) $request->get('payment_status', ''))) {
            $query->where('payment_status', $paymentStatus);
        }

        if ($search = trim((string) $request->get('q', ''))) {
            $query->where(function ($builder) use ($search) {
                $builder->where('notes', 'like', "%{$search}%")
                    ->orWhereHas('student', function ($student) use ($search) {
                        $student->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('phone', 'like', "%{$search}%");
                    });
            });
        }

        $orders = $query->paginate(20)->withQueryString();

        return view('admin.registrations.index', [
            'orders' => $orders,
            'paymentStatus' => $paymentStatus ?? '',
            'search' => $search ?? '',
        ]);
    }
}
