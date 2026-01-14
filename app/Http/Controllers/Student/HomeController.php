<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('student.home');
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
