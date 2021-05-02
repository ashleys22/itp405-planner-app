<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index', [
            'courses' => Course::with(['user'])
                ->where('user_id', '=', Auth::user()->id)
                ->orderBy('name')
                ->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'deadline' => 'required',
            'type' => 'required|exists:types,id',
            'course' => 'required|exists:courses,id',
            'description' => 'max:255'
        ]);

        $course = new Course();
        $course->name = $request->input('name');
        $course->user_id = Auth::user()->id;
        $course->save();

        return redirect()
            ->route('courses.index')
            ->with('success', "Successfully created {$request->input('name')}");
    }
}
