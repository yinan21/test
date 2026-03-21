<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    private $students = [
        ['id' => 1, 'name' => 'Alice Smith', 'course' => 'Medicine', 'year' => 2],
        ['id' => 2, 'name' => 'Bob Jones', 'course' => 'Dentistry', 'year' => 3],
        ['id' => 3, 'name' => 'Charlie Brown', 'course' => 'Medicine', 'year' => 1],
        ['id' => 4, 'name' => 'Diana Prince', 'course' => 'Pharmacy', 'year' => 4],
    ];

    public function index(Request $request)
    {
        $course = $request->query('course');
        $year = $request->query('year');

        if ($year !== null && !is_numeric($year)) {
            $year = null;
        }

        $filtered = collect($this->students)->filter(function ($student) use ($course, $year) {
            if ($course && $student['course'] !== $course) {
                return false;
            }
            if ($year && $student['year'] != $year) {
                return false;
            }
            return true;
        });

        return view('students.index', [
            'students' => $filtered,
            'course' => $course,
            'year' => $year,
        ]);
    }
}
