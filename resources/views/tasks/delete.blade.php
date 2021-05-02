{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('tasks.destroy', $task->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Are you sure you want to delete <i>{{ $task->name }}</i>?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
        <button type="submit" class="btn btn-danger">Delete Task</button>
    </div>
</form>