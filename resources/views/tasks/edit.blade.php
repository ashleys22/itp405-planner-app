@extends('layouts.main')

@section('title')
    Editing {{ $task->name }}
@endsection

@section('content')
<div class="d-flex justify-content-center container">
    <div class="col-md-8">          
        <a href="{{ route('tasks.index') }}" class="back" style="color:white;"><i class="fas fa-arrow-left"></i> Back</a>
        <div class="card">
            @if (session('success'))
                <div class="d-flex flex-row-reverse">
                    <div class="alert alert-success success" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="card-header">
                <div class="font-size-lg font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Edit Task</div>
            </div>
            <div class="scroll-area-sm">
                <form class="w-75 pt-4 mx-auto" action="{{ route('tasks.update', [ 'task' => $task->id ]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    {{-- <input type="hidden" name="user_id" id="user_id" value={{ Auth::id() }}> --}}
                    <div class="row">
                        <div class="mb-2 col-sm-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $task->name) }}">
                            @error('name')
                                <small class="text-danger"> {{ $message }} </small> 
                            @enderror
                        </div>
                        <div class="mb-2 col-sm-6">
                            <label for="deadline" class="form-label">Deadline</label>
                            <input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline', $task->deadline) }}">
                            @error('deadline')
                                <small class="text-danger"> {{ $message }} </small> 
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-sm-6">
                            <label for="type" class="form-label">Task Type</label>
                            <select name="type" id="type" class="form-select">
                                <option value="">-- Select Type --</option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}" {{ $type->id === (int) old('type', $task->type_id) ? "selected" : "" }}>
                                        {{$type->name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-2 col-sm-6">
                            <label for="course" class="form-label">Course</label>
                            <select name="course" id="course" class="form-select">
                                <option value="">-- Select Course --</option>
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}" {{ $course->id === (int) old('course', $task->course_id) ? "selected" : "" }}>
                                        {{$course->name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('course')
                                <small class="text-danger">{{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description (optional)</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $task->description) }}</textarea>
                        @error('description')
                            <small class="text-danger"> {{ $message }} </small> 
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection