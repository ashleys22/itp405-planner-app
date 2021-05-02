@extends('layouts.main')

@section('title', 'Add New Course')

@section('content')
<div class="d-flex justify-content-center container">
    <div class="col-md-8">          
        <a href="{{ route('tasks.index') }}" class="back" style="color:white;"><i class="fas fa-arrow-left"></i> Back</a>
        <div class="card">
            <div class="card-header">
                <div class="font-size-lg font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Add New Course</div>
            </div>
            <div class="scroll-area-sm">
                <form class="w-75 pt-4 mx-auto" action="{{ route('courses.store') }}" method="POST">
                    @csrf
                    {{-- <input type="hidden" name="user_id" id="user_id" value={{ Auth::id() }}> --}}
                    <p>Please add your courses for this term.</p>
                    <div class="row">
                        <div class="mb-4 col-sm-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger"> {{ $message }} </small> 
                            @enderror
                        </div>
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