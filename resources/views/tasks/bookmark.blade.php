{{-- !-- Bookmark Warning Modal -->  --}}
<form action="{{ route('tasks.bookmark', $task->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('PUT')
        @if ($task->bookmarked)
            <h5 class="text-center">Do you want to remove <i>{{ $task->name }}</i>'s bookmark?</h5>
        @else
            <h5 class="text-center">Do you want to bookmark <i>{{ $task->name }}</i>?</h5>
        @endif
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
        <button type="submit" class="btn btn-warning">Yes</button>
    </div>
</form>