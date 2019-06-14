<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Student;
use App\Models\Classroom;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Dashboard';
        $all_students = Student::all()->count();
        $pending_students  = Student::where('status', 'pending')->count();
        $accepted_students = Student::where('status', 'accepted')->count();
        $refused_students  = Student::where('status', 'refused')->count();
        $new_students  = $pending_students;
        $boys  = Student::where('gender', 'boy')->count();
        $girls  = Student::where('gender', 'girl')->count();

        $classes = Classroom::all()->count();

        $boys_rate = (($boys / $all_students) * 100) . '% of Students';
        $girls_rate = (( $girls / $all_students) * 100) . '% of Students';

        return view('back-end.dashboard', 
        compact(
            'title',
            'all_students',
            'pending_students',
            'accepted_students',
            'refused_students',
            'new_students',
            'boys',
            'girls',
            'classes',
            'boys_rate',
            'girls_rate'
        ));
    }
}
