<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Course;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasks.index', [
            'tasks' => Task::with(['course', 'type', 'user'])
                ->where('user_id', '=', Auth::user()->id)
                ->orderBy('deadline')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create', [
            'courses' => Course::orderBy('name')->get(),
            'types' => Type::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'deadline' => 'required',
            'type' => 'required|exists:types,id',
            'course' => 'required|exists:courses,id',
            'description' => 'max:255'
        ]);

        $task = new Task();
        $task->name = $request->input('name');
        $task->deadline = $request->input('deadline');
        $task->type_id = $request->input('type');
        $task->course_id = $request->input('course');
        $task->user_id = Auth::user()->id;
        $task->description = $request->input('description');
        $task->bookmarked = false;
        $task->save();

        return redirect()
            ->route('tasks.index')
            ->with('success', "Successfully created {$request->input('name')}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', [
            'courses' => Course::orderBy('name')->get(),
            'types' => Type::all(),
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // return redirect()
        //     ->route('tasks.index')
        //     ->with('success', "Successfully created {$request->input('name')}");

        $task = Task::find($id);
        //$this->authorize('update', $task);

        $request->validate([
            'name' => 'required|max:50',
            'deadline' => 'required',
            'type' => 'required|exists:types,id',
            'course' => 'required|exists:courses,id',
            'description' => 'max:255'
        ]);

        $task->name = $request->input('name');
        $task->deadline = $request->input('deadline');
        $task->type_id = $request->input('type');
        $task->course_id = $request->input('course');
        $task->description = $request->input('description');
        $task->save();

        return redirect()
            ->route('tasks.edit', ['task' => $id])
            ->with('success', "Successfully updated {$request->input('name')}");
    }

    public function delete($id)
    {
        $task = Task::find($id);

        return view('tasks.delete', compact('task'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $name = $task->name;
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', "{$name} deleted successfully");
    }
}
