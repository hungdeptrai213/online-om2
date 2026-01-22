<?php

namespace App\Models;

use App\Models\Course;
use App\Notifications\StudentResetPassword;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class)
            ->withTimestamps()
            ->withPivot(['purchased_at', 'expires_at', 'source']);
    }

    public function hasCourseAccess(Course $course): bool
    {
        if ($course->isFree()) {
            return true;
        }

        return $this->getOwnedCourseIds()->contains($course->id);
    }

    public function grantCourseAccess(Course $course, ?string $source = null, ?Carbon $expiresAt = null): void
    {
        $this->courses()->syncWithoutDetaching([
            $course->id => [
                'purchased_at' => now(),
                'expires_at' => $expiresAt,
                'source' => $source,
            ],
        ]);

        $this->forgetCourseAccessCache();
    }

    public function revokeCourseAccess(Course $course): void
    {
        $this->courses()->detach($course->id);
        $this->forgetCourseAccessCache();
    }

    public function forgetCourseAccessCache(): void
    {
        Cache::forget($this->courseAccessCacheKey());
    }

    public function getOwnedCourseIds(): Collection
    {
        return Cache::remember(
            $this->courseAccessCacheKey(),
            now()->addMinutes(15),
            fn () => $this->courses()->pluck('course_id')
        );
    }

    protected function courseAccessCacheKey(): string
    {
        return "student:{$this->id}:course_ids";
    }

    /**
     * Gửi mail đặt lại mật khẩu với link dành cho student.
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new StudentResetPassword($token));
    }
}
