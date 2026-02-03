<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'price',
        'published_at',
        'description',
        'thumbnail',
        'lecturer_name',
        'lecturer_bio',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'published_at' => 'date',
    ];

    public function topics(): BelongsToMany
    {
        return $this->belongsToMany(DocumentTopic::class)
            ->withTimestamps();
    }
}
