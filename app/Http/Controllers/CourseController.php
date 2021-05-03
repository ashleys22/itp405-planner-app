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
        $this->validate(
            $request,
            [
                'addmore.*.name' => 'required|max:50',
            ],
            [
                'addmore.*.name.required' => "All course name are required.",
                'addmore.*.name.max' => "Maximum 50 characters",
            ]
        );

        foreach ($request->addmore as $key => $value) {
            $course = new Course();
            $course->name = $value["name"];
            $course->user_id = Auth::user()->id;
            $course->save();
        }

        $count = count($request->addmore);

        //  return back()->with('success', 'Record Created Successfully.');

        return redirect()
            ->route('courses.index')
            ->with('success', "Successfully created {$count} new courses");
    }
}
