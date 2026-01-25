<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;
use App\Models\FormSubmission;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categoryKey = $request->get('category', 'home');
        $q = trim((string) $request->get('q', ''));

        $categoryMap = [
            'library' => 'Thư viện',
            'recommended' => 'Đề xuất',
            'featured' => 'Nổi bật',
            'new' => 'Mới ra',
        ];

        $isHome = $categoryKey === 'home';
        $showFilterResults = !$isHome || $q !== '';

        $filterHeading = $showFilterResults
            ? ($categoryMap[$categoryKey] ?? 'KhĂ³a há»c')
            : null;

        $filterCourses = collect();

        if ($showFilterResults) {
            $filterQuery = Course::with('categories')->where('status', 'published');

            if (isset($categoryMap[$categoryKey])) {
                $filterQuery->whereHas('categories', function ($qCat) use ($categoryMap, $categoryKey) {
                    $qCat->where('name', $categoryMap[$categoryKey]);
                });
            }

            if ($q !== '') {
                $filterQuery->where(function ($builder) use ($q) {
                    $builder->where('title', 'like', '%' . $q . '%')
                        ->orWhere('slug', 'like', '%' . $q . '%')
                        ->orWhere('author', 'like', '%' . $q . '%')
                        ->orWhere('short_description', 'like', '%' . $q . '%')
                        ->orWhere('description', 'like', '%' . $q . '%');
                });
            }

            $filterCourses = $filterQuery
                ->latest('published_at')
                ->get();
        }

        $libraryCourses = collect();
        $recommendedCourses = collect();
        $featuredCourses = collect();
        $newCourses = collect();

        if ($isHome && $q === '') {
            $student = auth('student')->user();
            $ownedCourseIds = collect();

            if ($student) {
                $libraryCourses = $student->courses()
                    ->with('categories')
                    ->where('status', 'published')
                    ->latest('published_at')
                    ->get();

                // Danh sách khóa học đã sở hữu để loại khỏi đề xuất
                $ownedCourseIds = $libraryCourses->pluck('id');
            } else {
                $libraryCourses = Course::with('categories')
                    ->where('status', 'published')
                    ->whereHas('categories', function ($qCat) {
                        $qCat->where('name', 'Thư viện');
                    })
                    ->latest('published_at')
                    ->take(5)
                    ->get();
            }

            $recommendedCourses = Course::with('categories')
                ->where('status', 'published')
                ->whereHas('categories', function ($qCat) {
                    $qCat->where('name', 'Đề xuất');
                })
                ->when($ownedCourseIds->isNotEmpty(), function ($q) use ($ownedCourseIds) {
                    $q->whereNotIn('id', $ownedCourseIds);
                })
                ->latest('published_at')
                ->take(5)
                ->get();

            $featuredCourses = Course::with('categories')
                ->where('status', 'published')
                ->whereHas('categories', function ($qCat) {
                    $qCat->where('name', 'Nổi bật');
                })
                ->when($ownedCourseIds->isNotEmpty(), function ($q) use ($ownedCourseIds) {
                    $q->whereNotIn('id', $ownedCourseIds);
                })
                ->latest('published_at')
                ->take(5)
                ->get();

            $newCourses = Course::with('categories')
                ->where('status', 'published')
                ->whereHas('categories', function ($qCat) {
                    $qCat->where('name', 'Mới ra');
                })
                ->when($ownedCourseIds->isNotEmpty(), function ($q) use ($ownedCourseIds) {
                    $q->whereNotIn('id', $ownedCourseIds);
                })
                ->latest('published_at')
                ->take(5)
                ->get();
        }

        return view('student.home', [
            'filterCourses' => $filterCourses,
            'filterHeading' => $filterHeading,
            'currentCategory' => $categoryKey,
            'searchTerm' => $q,
            'courses' => $libraryCourses,
            'recommended' => $recommendedCourses,
            'featured' => $featuredCourses,
            'newCourses' => $newCourses,
            'showHomeSections' => $isHome && $q === '',
            'showFilterResults' => $showFilterResults,
        ]);
    }

    public function coaching()
    {
        return view('student.coaching');
    }

    public function submitCoaching(Request $request)
    {
        $data = $request->validate([
            'plan_type' => ['required', 'in:buoi_le,lo_trinh'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        try {
            FormSubmission::create([
                'form_type' => 'coaching',
                'plan_type' => $data['plan_type'],
                'name' => $data['name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'message' => $data['message'],
            ]);
            Mail::send('emails.coaching-request', ['data' => $data], function ($m) use ($data) {
                $m->to('ilovebesun1996@gmail.com')
                    ->subject('Đăng ký Coaching 1 kèm 1 - ' . $data['name']);
            });

            return back()->with('coaching_success', 'Gửi đăng ký thành công. Chúng tôi sẽ liên hệ sớm nhất!');
        } catch (\Throwable $e) {
            report($e);
            return back()->withInput()->with('coaching_error', 'Gửi đăng ký thất bại, vui lòng thử lại sau.');
        }
    }

    public function schedule()
    {
        return view('student.schedule');
    }

    public function materials()
    {
        return view('student.materials');
    }

    public function enterprise()
    {
        return view('student.enterprise');
    }

    public function submitEnterprise(Request $request)
    {
        $data = $request->validate([
            'company' => ['required', 'string', 'max:255'],
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'employee_count' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        try {
            FormSubmission::create([
                'form_type' => 'enterprise',
                'company' => $data['company'],
                'contact_name' => $data['contact_name'],
                'contact_phone' => $data['contact_phone'],
                'email' => $data['email'],
                'employee_count' => $data['employee_count'],
                'message' => $data['message'],
            ]);

            return back()->with('enterprise_success', 'Chúng tôi đã ghi nhận yêu cầu, sẽ liên hệ bạn sớm nhất.');
        } catch (\Throwable $e) {
            report($e);
            return back()->withInput()->with('enterprise_error', 'Gửi đăng ký thất bại, vui lòng thử lại sau.');
        }
    }

    public function courseDetail(Request $request, $courseId = null)
    {
        $courseId = $courseId ?? $request->get('course');
        if (!$courseId || !is_numeric($courseId)) {
            abort(404);
        }

        $course = Course::with([
            'categories',
            'chapters' => function ($query) {
                $query->orderBy('position')->orderBy('id');
            },
            'chapters.lessons' => function ($query) {
                $query->orderBy('position')->orderBy('id');
            },
        ])
            ->where('status', 'published')
            ->findOrFail($courseId);

        $totalDurationSeconds = $course->chapters
            ->flatMap(fn ($chapter) => $chapter->lessons)
            ->sum('duration_seconds');

        $student = auth('student')->user();
        $hasAccess = $course->isFree();

        if (!$hasAccess && $student) {
            $hasAccess = Gate::forUser($student)->check('view', $course);
        }

        return view('student.course-detail', [
            'course' => $course,
            'totalDurationSeconds' => (int) $totalDurationSeconds,
            'hasAccess' => $hasAccess,
        ]);
    }

    public function cart(Request $request)
    {
        $courseId = $request->get('course');
        $course = $courseId ? Course::where('status', 'published')->find($courseId) : null;
        $student = auth('student')->user();
        $transferNote = $student && $course ? 'mh' . $student->id . $course->id : null;

        return view('student.cart', [
            'course' => $course,
            'transferNote' => $transferNote,
        ]);
    }

    public function profile()
    {
        $student = auth('student')->user();
        if (!$student) {
            return redirect()->route('student.login');
        }

        return view('student.profile', [
            'student' => $student,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $student = auth('student')->user();
        if (!$student) {
            return redirect()->route('student.login');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        $student->name = $data['name'];
        $student->phone = $data['phone'] ?? null;
        if (!empty($data['password'])) {
            $student->password = bcrypt($data['password']);
        }
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $student->avatar = 'storage/' . $path;
        }
        $student->save();

        return back()->with('status', 'Cáº­p nháº­t há»“ sÆ¡ thĂ nh cĂ´ng.');
    }

    public function myCourses()
    {
        $student = auth('student')->user();
        if (!$student) {
            return redirect()->route('student.login');
        }

        $courses = $student->courses()
            ->with('categories')
            ->where('status', 'published')
            ->orderByDesc('published_at')
            ->get();

        return view('student.my-courses', [
            'courses' => $courses,
        ]);
    }

    public function learn(Request $request, $courseId, $lessonId = null)
    {
        $course = Course::with(['chapters' => function ($q) {
            $q->orderBy('position')->orderBy('id');
        }, 'chapters.lessons' => function ($q) {
            $q->orderBy('position')->orderBy('id');
        }])->where('status', 'published')->findOrFail($courseId);

        $student = auth('student')->user();
        $hasAccess = $course->isFree();
        if (!$hasAccess && $student) {
            $hasAccess = Gate::forUser($student)->check('view', $course);
        }
        if (!$hasAccess) {
            return redirect()->route('student.course-detail', ['course' => $course->id])
                ->with('msg', 'Báº¡n cáº§n mua khĂ³a há»c Ä‘á»ƒ vĂ o há»c.');
        }

        $lessons = $course->chapters->flatMap(fn ($chapter) => $chapter->lessons)->values();
        if ($lessons->isEmpty()) {
            abort(404);
        }

        $currentLesson = $lessonId
            ? $lessons->firstWhere('id', (int) $lessonId) ?? $lessons->first()
            : $lessons->first();

        $currentIndex = $lessons->search(fn ($item) => $item->id === $currentLesson->id);
        $prevLesson = $currentIndex > 0 ? $lessons->get($currentIndex - 1) : null;
        $nextLesson = $currentIndex !== false && $currentIndex < $lessons->count() - 1 ? $lessons->get($currentIndex + 1) : null;

        $comments = Comment::with(['student', 'repliesRecursive.student'])
            ->where('course_id', $course->id)
            ->where('lesson_id', $currentLesson->id)
            ->whereNull('parent_id')
            ->latest()
            ->get();

        return view('student.course-learn', [
            'course' => $course,
            'lessons' => $lessons,
            'currentLesson' => $currentLesson,
            'prevLesson' => $prevLesson,
            'nextLesson' => $nextLesson,
            'comments' => $comments,
        ]);
    }
}
