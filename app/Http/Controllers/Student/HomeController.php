<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

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
            $libraryCourses = Course::with('categories')
                ->where('status', 'published')
                ->whereHas('categories', function ($qCat) {
                    $qCat->where('name', 'Thư viện');
                })
                ->latest('published_at')
                ->take(5)
                ->get();

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

    public function courseDetail()
    {
        return view('student.course-detail');
    }

    public function cart()
    {
        return view('student.cart');
    }
}
