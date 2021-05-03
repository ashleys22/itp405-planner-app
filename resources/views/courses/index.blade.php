@extends('layouts.main')

@section('title', 'Courses')

@section('content')
<div class="row d-flex justify-content-center container">
    <div class="col-md-8">
        <a href="{{ route('tasks.index') }}" class="back" style="color:white;"><i class="fas fa-list me-2"></i> View Task List</a>
        <div class="card">
            @if (session('success'))
                <div class="d-flex flex-row-reverse">
                    <div class="alert alert-success message" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="card-header">
                <div class="font-size-lg font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Courses</div>
                <div class="ms-auto me-2"> 
                    <a href="/courses/create" class="border-0 btn-transition btn btn-outline-secondary"> <i class="fas fa-plus"></i> </a>       
                </div>
            </div>
            <div class="scroll-area-sm">
                <ul class="list-group list-group-flush">
                    @foreach($courses as $course)
                        <li class="list-group-item my-2">
                            <div class="courses"></div>
                            <div class="widget-content p-0 ms-2">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">
                                            {{ $course->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- small modal -->
<div class="modal" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Task</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="smallBody">
                <!-- modal content here -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href, 
            beforeSend: function() {
                $('#smallBody').html("").show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }, error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
            }
        })
    });

</script>

@endsection