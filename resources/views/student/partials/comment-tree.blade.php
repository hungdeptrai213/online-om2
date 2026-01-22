@foreach($comments as $comment)
    <div class="comment-item" style="margin-left: {{ $level * 16 }}px;">
        <div class="d-flex justify-content-between align-items-center">
            <div class="fw-semibold small mb-1">{{ $comment->student->name ?? 'Học viên' }}</div>
            <small class="text-muted">{{ $comment->created_at?->diffForHumans() }}</small>
        </div>
        <div class="text-muted">{{ $comment->content }}</div>
        <button type="button" class="btn btn-link btn-sm p-0 mt-1 btn-reply" data-id="{{ $comment->id }}">Trả lời</button>
        @if($comment->repliesRecursive?->count())
            @include('student.partials.comment-tree', ['comments' => $comment->repliesRecursive, 'level' => $level + 1])
        @endif
    </div>
@endforeach
