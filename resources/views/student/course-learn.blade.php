@extends('student.layouts.app')

@section('style')
<style>
.learn-layout {
    background: #f7f5ef;
    min-height: 100vh;
    padding-top: 24px;
    padding-bottom: 40px;
}
.lesson-list {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #e6ecf5;
    max-height: 80vh;
    overflow-y: auto;
}
.lesson-item-row {
    display: flex;
    justify-content: space-between;
    gap: 8px;
    padding: 12px 14px;
    border-bottom: 1px solid #f1f2f6;
    text-decoration: none;
    color: #1f2d3d;
    transition: background 0.15s ease;
}
.lesson-item-row:last-child { border-bottom: 0; }
.lesson-item-row:hover { background: #f7f9fd; }
.lesson-item-row.active { background: #ecf2ff; }
.video-box {
    background: #000;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 16px 40px rgba(0,0,0,0.1);
}
.comment-box {
    background: #fff;
    border-radius: 12px;
    border: 1px solid #e6ecf5;
}
.comment-list {
    max-height: 260px;
    overflow-y: auto;
}
.comment-item {
    border-bottom: 1px solid #f1f2f6;
    padding: 8px 0;
}
.comment-item:last-child { border-bottom: 0; }
.chapter-title {
    padding: 10px 14px;
    margin: 0;
    font-weight: 700;
    background: #f9fafb;
    border-bottom: 1px solid #f1f2f6;
}
</style>
@endsection

@section('content')
<div class="learn-layout">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="video-box mb-3">
                    <div class="ratio ratio-16x9">
                        <iframe id="lessonPlayer" src="" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold mb-0">{{ $currentLesson->title ?? 'Bài học' }}</h4>
                    <div class="d-flex gap-2">
                        @if($prevLesson)
                            <a class="btn btn-outline-secondary btn-sm" href="{{ route('student.course.learn', ['course' => $course->id, 'lesson' => $prevLesson->id]) }}">← Bài trước</a>
                        @endif
                        @if($nextLesson)
                            <a class="btn btn-primary btn-sm" href="{{ route('student.course.learn', ['course' => $course->id, 'lesson' => $nextLesson->id]) }}">Bài tiếp →</a>
                        @endif
                    </div>
                </div>
                <div class="comment-box p-3">
                    <h5 class="fw-bold mb-2">Bình luận</h5>
                    <form method="POST" action="{{ route('student.comments.store') }}" class="mb-3" id="commentForm">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="hidden" name="lesson_id" value="{{ $currentLesson->id }}">
                        <input type="hidden" name="parent_id" id="parent_id" value="">
                        <div class="mb-2">
                            <textarea name="content" id="commentContent" class="form-control" rows="2" placeholder="Viết bình luận..." required></textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="cancelReply" style="display:none;">Hủy trả lời</button>
                            <button class="btn btn-primary btn-sm" type="submit">Gửi</button>
                        </div>
                    </form>
                    <div class="comment-list" id="commentList">
                        @include('student.partials.comment-tree', ['comments' => $comments, 'level' => 0])
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="lesson-list shadow-sm">
                    <div class="p-3 border-bottom" style="background:#f9fafb;">
                        <h5 class="fw-bold mb-1">{{ $course->title }}</h5>
                        <p class="text-muted mb-0 small">Nội dung khóa học</p>
                    </div>
                    @foreach($course->chapters as $chapter)
                        <p class="chapter-title mb-0">Chương {{ $loop->iteration }}: {{ $chapter->title }}</p>
                        @foreach($chapter->lessons as $lesson)
                            @php
                                $seconds = max(0, (int) $lesson->duration_seconds);
                                $format = $seconds >= 3600 ? 'H:i:s' : 'i:s';
                                $duration = $seconds ? gmdate($format, $seconds) : null;
                            @endphp
                            <a class="lesson-item-row {{ $lesson->id === $currentLesson->id ? 'active' : '' }}"
                               href="{{ route('student.course.learn', ['course' => $course->id, 'lesson' => $lesson->id]) }}">
                                <div class="fw-semibold">{{ $lesson->title }}</div>
                                @if($duration)
                                    <div class="text-muted small">{{ $duration }}</div>
                                @endif
                            </a>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        const iframe = document.getElementById('lessonPlayer');
        const videoUrl = @json($currentLesson->video_url ?? '');

        const getEmbedUrl = (input) => {
            if (!input) return '';

            const iframeMatch = input.match(/src=["']([^"']+)["']/i);
            if (iframeMatch) {
                return iframeMatch[1];
            }

            const ytWatch = input.match(/(?:youtube\.com\/watch\?v=)([\w-]+)/i);
            const ytShort = input.match(/youtu\.be\/([\w-]+)/i);
            const videoId = ytWatch ? ytWatch[1] : ytShort ? ytShort[1] : null;
            if (videoId) {
                return `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
            }

            return input;
        };

        iframe.src = getEmbedUrl(videoUrl);

        // Reply handler
        const replyButtons = document.querySelectorAll('.btn-reply');
        const parentInput = document.getElementById('parent_id');
        const cancelReply = document.getElementById('cancelReply');
        const commentContent = document.getElementById('commentContent');

        replyButtons.forEach((btn) => {
            btn.addEventListener('click', () => {
                const pid = btn.getAttribute('data-id');
                parentInput.value = pid;
                cancelReply.style.display = 'inline-flex';
                commentContent.focus();
            });
        });

        if (cancelReply && parentInput) {
            cancelReply.addEventListener('click', () => {
                parentInput.value = '';
                cancelReply.style.display = 'none';
            });
        }
    })();
</script>
@endsection
