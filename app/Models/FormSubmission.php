<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
