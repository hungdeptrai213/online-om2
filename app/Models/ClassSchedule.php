<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'schedule',
        'start_date',
        'sessions',
        'format',
        'cost',
        'author',
        'shared_by',
        'status',
        'cover_url',
        'description',
    ];

    protected $dates = [
        'start_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'cost' => 'decimal:2',
    ];
}
