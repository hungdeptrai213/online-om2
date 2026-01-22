<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

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
            ? ($categoryMap[$categoryKey] ?? 'Khóa học')
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
            if ($student) {
                $libraryCourses = $student->courses()
                    ->with('categories')
                    ->where('status', 'published')
                    ->latest('published_at')
                    ->get();
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
                ->latest('published_at')
                ->take(5)
                ->get();

            $featuredCourses = Course::with('categories')
                ->where('status', 'published')
                ->whereHas('categories', function ($qCat) {
                    $qCat->where('name', 'Nổi bật');
                })
                ->latest('published_at')
                ->take(5)
                ->get();

            $newCourses = Course::with('categories')
                ->where('status', 'published')
                ->whereHas('categories', function ($qCat) {
                    $qCat->where('name', 'Mới ra');
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

        return back()->with('status', 'Cập nhật hồ sơ thành công.');
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
}
