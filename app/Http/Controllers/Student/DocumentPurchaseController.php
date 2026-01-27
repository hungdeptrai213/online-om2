<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\FormSubmission;
use Illuminate\Http\Request;

class DocumentPurchaseController extends Controller
{
    public function show(Document $document)
    {
        if ($document->price <= 0) {
            abort(404);
        }

        return view('student.document-cart', [
            'document' => $document,
            'student' => auth('student')->user(),
        ]);
    }

    public function confirm(Request $request, Document $document)
    {
        $payload = $request->validate([
            'amount' => ['required', 'numeric', 'min:0'],
            'payment_note' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:500'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        if (abs($payload['amount'] - (float) $document->price) > 0.01) {
            return response()->json(['message' => 'Số tiền thanh toán không khớp với giá tài liệu.'], 422);
        }

        FormSubmission::create([
            'form_type' => 'document_purchase',
            'name' => $payload['name'],
            'phone' => $payload['phone'],
            'email' => $payload['email'],
            'message' => $payload['notes'],
            'address' => $payload['address'],
            'notes' => $payload['notes'],
            'document_id' => $document->id,
            'document_title' => $document->title,
            'document_price' => (float) $document->price,
            'payment_note' => $payload['payment_note'],
        ]);

        return response()->json([
            'message' => 'Chúng tôi đã ghi nhận thanh toán, tài liệu sẽ được gửi đến bạn sớm.',
        ]);
    }
}
