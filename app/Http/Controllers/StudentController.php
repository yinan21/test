<?php

// app/Http/Controllers/StudentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        // Filter: course
        if ($request->filled('course')) {
            $query->where('course', $request->course);
        }

        // Filter: year
        if ($request->filled('year') && is_numeric($request->year)) {
            $query->where('year', $request->year);
        }

        // Search (name)
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sorting
        if ($request->filled('sort')) {
            $direction = $request->get('direction', 'asc');
            $query->orderBy($request->sort, $direction);
        }

        // Pagination (important)
        $students = $query->paginate(5)->withQueryString();

        return view('students.index', [
            'students' => $students,
        ]);
    }
}
