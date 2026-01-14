<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_chapter_id',
        'title',
        'description',
        'duration_seconds',
        'video_url',
        'is_previewable',
        'position',
    ];

    protected function casts(): array
    {
        return [
            'is_previewable' => 'boolean',
        ];
    }

    public function chapter()
    {
        return $this->belongsTo(CourseChapter::class, 'course_chapter_id');
    }
}
