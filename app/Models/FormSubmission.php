<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_type',
        'plan_type',
        'name',
        'phone',
        'email',
        'company',
        'contact_name',
        'contact_phone',
        'employee_count',
        'message',
        'field',
        'document_id',
        'document_title',
        'document_price',
        'payment_note',
        'address',
        'notes',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}
