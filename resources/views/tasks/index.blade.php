@extends('layouts.main')

@section('title', 'To-do List')

@section('content')
<div class="row d-flex justify-content-center container">
    <div class="col-md-8">
        <div class="card">
            @if (session('success'))
                <div class="d-flex flex-row-reverse">
                    <div class="alert alert-success message" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="card-header">
                <div class="font-size-lg font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Task List</div>
                <div class="ms-auto me-2"> 
                    <a href="{{ route('tasks.create') }}" class="border-0 btn-transition btn btn-outline-secondary"> <i class="fas fa-plus"></i> </a>       
                </div>
            </div>
            <div class="scroll-area-sm">
                <ul class="list-group list-group-flush">
                    @foreach($tasks as $task)
                        <li class="list-group-item my-2">
                            <div class="bookmarked"></div>
                            <div class="widget-content p-0 ms-2">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">
                                            {{ $task->name }}
                                            <i class="widget-subheading ms-2">{{ $task->deadline }}</i>
                                        </div>
                                        <div class="widget-subheading">
                                            <i>{{ $task->course->name }} </i> 
                                            <div class="badge badge-pill bg-info ms-2">{{ $task->type->name }}</div>
                                        </div>
                                    </div>
                                    <div class="widget-content-right"> 
                                        <a href="{{ route('tasks.edit', [ 'task' => $task->id ]) }}" class="border-0 btn-transition btn btn-outline-success"> <i class="fas fa-edit"></i> </a> 
                                        <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('tasks.delete', $task->id) }}" title="Delete Task" class="border-0 btn-transition btn btn-outline-danger"> <i class="fas fa-trash"></i> </a> 
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