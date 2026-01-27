<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormSubmission;
use Illuminate\Http\Request;

class FormSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $query = FormSubmission::query()->latest();

        if ($search = trim((string) $request->get('q', ''))) {
            $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('company', 'like', "%{$search}%")
                ->orWhere('contact_name', 'like', "%{$search}%")
                ->orWhere('message', 'like', "%{$search}%")
                ->orWhere('field', 'like', "%{$search}%")
                ->orWhere('document_title', 'like', "%{$search}%")
                ->orWhere('payment_note', 'like', "%{$search}%")
                ->orWhere('address', 'like', "%{$search}%")
                ->orWhere('notes', 'like', "%{$search}%");
            });
        }

        if ($formType = trim((string) $request->get('form_type', ''))) {
            $query->where('form_type', $formType);
        }

        $submissions = $query->paginate(20)->withQueryString();

        return view('admin.forms.index', [
            'submissions' => $submissions,
            'formType' => $formType ?? '',
            'search' => $search,
        ]);
    }
}
