@extends('layouts.main')

@section('title', 'Add New Course')

@section('content')
<div class="d-flex justify-content-center container">
    <div class="col-md-8">          
        <a href="{{ route('courses.index') }}" class="back" style="color:white;"><i class="fas fa-arrow-left"></i> View My Courses</a>
        <div class="card">
            <div class="card-header">
                <div class="font-size-lg font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Add New Course</div>
            </div>
            <div class="scroll-area-sm">
                <form class="w-75 pt-4 mx-auto" action="{{ route('courses.store') }}" method="POST">
                    @csrf
                    <p>Please add your courses for this term.</p>
                    <ol id="dynamicTable">
                        <li class="mb-3">
                            <div class="row">
                                <div class="col-sm-7">
                                    <input type="text" name="addmore[0][name]" placeholder="Enter your course name" id="addmore[0][name]" class="form-control" value="{{ old('addmore[0][name]') }}">
                                    @error('addmore.*.name')
                                        <small class="text-danger"> {{ $message }} </small> 
                                    @enderror
                                </div>
                            </div>
                        </li>
                        {{-- append input rows here --}}
                    </ol>
                    <div class="mt-4">
                        <button type="button" name="add" id="add" class="btn btn-success">
                            Add More
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var i = 0;

    $("#add").click(function(){
        ++i;

        $("#dynamicTable").append(
            `<li class="mb-3">
                <div class="row">
                    <div class="col-sm-7">
                        <input type="text" name="addmore[`+i+`][name]" placeholder="Enter your course name" id="addmore[`+i+`][name]" class="form-control" value="{{ old('addmore[`+i+`][name]') }}">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                    </div>
                </div>
            </li>`
        );
    });

    $(document).on('click', '.remove-row', function(){  
         $(this).parents('li').remove();
    });  

</script>

@endsection