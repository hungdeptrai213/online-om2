<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_category_id',
        'title',
        'slug',
        'price',
        'sale_price',
        'short_description',
        'description',
        'author',
        'thumbnail',
        'status',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'price' => 'decimal:2',
            'sale_price' => 'decimal:2',
        ];
    }

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }

    public function categories()
    {
        return $this->belongsToMany(CourseCategory::class, 'course_course_category');
    }

    public function chapters()
    {
        return $this->hasMany(CourseChapter::class);
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, CourseChapter::class, 'course_id', 'course_chapter_id');
    }
}
