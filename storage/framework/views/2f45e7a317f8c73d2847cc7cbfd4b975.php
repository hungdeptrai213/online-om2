<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="/om-front/css/custom-option.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $thumb = $course->thumbnail;
        $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
            ? $thumb
            : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
        $price = $course->sale_price ?? $course->price ?? 0;
        $displayPrice = $price > 0 ? number_format($price, 0, ',', '.') : 'Miễn phí';
        $categoryNames = optional($course->categories)->pluck('name')->filter()->implode(', ');
        $lessons = $course->chapters->flatMap->lessons;
        $lessonCount = $lessons->count();
        $hours = intdiv($totalDurationSeconds, 3600);
        $minutes = intdiv($totalDurationSeconds % 3600, 60);
        $durationText = $totalDurationSeconds > 0
            ? trim(($hours ? $hours . ' giờ ' : '') . ($minutes ? $minutes . ' phút' : ''))
            : null;
    ?>

    <div class="container mt-6">
        <div class="row gx-lg-4 gx-xl-5 justify-content-between thong-tin-khoa-hoc">
            <!-- Left -->
            <div class="col-lg-9 mb-5">
                <p class="fs-1 fw-bold mb-1"><?php echo e($course->title); ?></p>
                <?php if($categoryNames): ?>
                    <p class="fs-4 fst-italic mb-1">Thể loại: <?php echo e($categoryNames); ?></p>
                <?php endif; ?>
                <?php if($course->author): ?>
                    <p class="fs-4 mb-3">Tác giả: <?php echo e($course->author); ?></p>
                <?php endif; ?>

                <p class="fs-1 mb-1 fw-bold">Giới thiệu khóa học</p>
                <?php if($course->short_description): ?>
                    <p class="fs-3 mb-2"><?php echo e($course->short_description); ?></p>
                <?php endif; ?>
                <?php if($course->description): ?>
                    <div class="fs-3 mb-4"><?php echo nl2br(e($course->description)); ?></div>
                <?php else: ?>
                    <p class="fs-3 mb-4 text-muted">Khóa học đang cập nhật mô tả chi tiết.</p>
                <?php endif; ?>

                <p class="fs-1 fw-bold mb-1 mt-4">Nội dung khóa học</p>

                <?php $lessonIndex = 0; ?>
                <?php $__empty_1 = true; $__currentLoopData = $course->chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <p class="fs-3 mb-3 fw-bold mt-4">Chương <?php echo e($loop->iteration); ?>: <?php echo e($chapter->title); ?></p>
                    <?php if($chapter->description): ?>
                        <p class="fs-4 mb-2 fst-italic"><?php echo e($chapter->description); ?></p>
                    <?php endif; ?>

                    <?php $__empty_2 = true; $__currentLoopData = $chapter->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                        <?php
                            $lessonIndex++;
                            $seconds = max(0, (int) $lesson->duration_seconds);
                            $format = $seconds >= 3600 ? 'H:i:s' : 'i:s';
                            $lessonDuration = $seconds ? gmdate($format, $seconds) : null;
                            $cleanTitle = preg_replace('/^Bài\s*\d+\s*[:.\-]?\s*/iu', '', $lesson->title ?? '');
                            $lessonLabel = 'Bài ' . $lessonIndex . ': ' . ($cleanTitle ?: $lesson->title);
                        ?>
                        <div class="d-flex flex-wrap justify-content-end align-items-center mb-sm-3 mb-md-1 nd-chuong lesson-item" data-lesson="<?php echo e($lessonIndex); ?>">
                            <div class="col-md-8 col-lg-9 col-xxl-10">
                                <div class="d-flex align-items-center">
                                    <p class="fs-3 mb-0"><?php echo e($lessonLabel); ?></p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xxl-2 d-flex justify-content-end flex-wrap">
                                <div class="d-flex justify-content-end align-items-center gap-3 flex-nowrap w-100" style="min-width: 190px;">
                                    <?php if($lessonDuration): ?>
                                        <span class="fs-5 text-muted"><?php echo e($lessonDuration); ?></span>
                                    <?php endif; ?>
                                    <a class="btn fs-4 p-0 me-lg-2 me-xl-3 lesson-view-btn"
                                       href="#"
                                       data-video="<?php echo e($lesson->video_url); ?>"
                                       data-preview="<?php echo e($lesson->is_previewable ? '1' : '0'); ?>"
                                       role="button">
                                        <img src="/om-front/img/Circled Play Button.png" alt="" width="25" class="mb-1">
                                        Xem
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                        <p class="fs-4 text-muted">Chương này chưa có bài học.</p>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="fs-4 text-muted">Khóa học chưa có nội dung.</p>
                <?php endif; ?>

                <div class="mt-4">
                    <button type="button" class="btn btn-warning fs-4 rounded-pill fw-bold px-3 shadow toggle-lessons" style="display: none;">
                        <span class="toggle-label">Xem thêm</span>
                    </button>
                </div>

                <p class="fs-1 fw-bold mb-1 mt-5">Ai nên học?</p>
                <ul class="fs-3">
                    <li>Học viên muốn nắm vững Content Marketing từ cơ bản đến ứng dụng.</li>
                    <li>Người làm marketing, kinh doanh cần hệ thống hóa kiến thức.</li>
                    <li>Chủ doanh nghiệp muốn hiểu và triển khai nội dung hiệu quả.</li>
                </ul>

                <p class="fs-1 fw-bold mb-1 mt-5">Giảng viên</p>
                <?php if($course->author): ?>
                    <p class="fs-3 mb-1"><?php echo e($course->author); ?></p>
                <?php else: ?>
                    <p class="fs-3 text-muted mb-1">Đang cập nhật thông tin giảng viên.</p>
                <?php endif; ?>
            </div>

            <!-- Right -->
            <div class="col-lg-3 d-flex flex-column mb-5">
                <div class="custom-bg-5 p-sm-3 p-md-3 p-lg-4 d-flex justify-content-center flex-column rounded-5 shadow">
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <img src="<?php echo e($thumbUrl); ?>" alt="<?php echo e($course->title); ?>" class="rounded-5 shadow-sm w-100">
                        </div>
                        <div class="col-md-6 col-lg-12 d-flex flex-column">
                            <p class="fs-1 mt-4 mb-1 fw-medium mb-1"><?php echo e($course->title); ?></p>
                            <?php if($course->author): ?>
                                <p class="fs-3 fst-italic mb-1">Tác giả: <?php echo e($course->author); ?></p>
                            <?php endif; ?>
                            <?php if($categoryNames): ?>
                                <p class="fs-3 fst-italic mb-1">Thể loại: <?php echo e($categoryNames); ?></p>
                            <?php endif; ?>
                            <?php if($durationText): ?>
                                <p class="fs-3 fst-italic mb-1">Thời lượng: <?php echo e($durationText); ?></p>
                            <?php endif; ?>
                            <?php if($lessonCount): ?>
                                <p class="fs-3 fst-italic mb-1"><?php echo e($lessonCount); ?> bài học</p>
                            <?php endif; ?>
                            <p class="fs-3 fst-italic mb-lg-5"><?php echo e($displayPrice); ?></p>

                            <?php if($hasAccess): ?>
                                <a class="btn btn-primary fs-3 rounded-4 fw-bold mt-auto mb-2" href="#" role="button">Vào học</a>
                            <?php else: ?>
                                <a class="btn btn-primary fs-3 rounded-4 fw-bold mt-auto mb-2" href="<?php echo e(route('student.cart', ['course' => $course->id])); ?>" role="button">Đăng ký</a>
                                <a class="btn btn-primary fs-3 rounded-4 fw-bold mt-2 mb-2" href="#" role="button">Vào học</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if(!$hasAccess): ?>
                    <a class="btn btn-primary fs-3 rounded-4 fw-bold mt-sm-3 mt-md-5 mt-lg-5 mx-lg-5 mb-5 shadow-sm ms-sm-auto me-sm-auto d-none" href="<?php echo e(route('student.cart', ['course' => $course->id])); ?>" role="button">Đăng ký</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="ratio ratio-16x9">
                    <iframe id="previewPlayer" src="" title="Học thử" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="previewBlockedModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;">
        <div class="modal-content">
            <div class="modal-body">
                <p class="fs-3 mb-0">Bạn cần mua khóa học để xem video này.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const lessonItems = Array.from(document.querySelectorAll('.lesson-item'));
    const toggleBtn = document.querySelector('.toggle-lessons');
    const toggleLabel = toggleBtn?.querySelector('.toggle-label');
    const visibleCount = 8;

    const applyLessonVisibility = (expanded) => {
        if (!lessonItems.length) return;
        lessonItems.forEach((item, idx) => {
            item.style.display = expanded || idx < visibleCount ? '' : 'none';
        });
        if (toggleLabel) {
            toggleLabel.textContent = expanded ? 'Thu gọn' : 'Xem thêm';
        }
    };

    if (lessonItems.length > visibleCount && toggleBtn) {
        toggleBtn.style.display = 'inline-flex';
        let expanded = false;
        applyLessonVisibility(expanded);
        toggleBtn.addEventListener('click', () => {
            expanded = !expanded;
            applyLessonVisibility(expanded);
        });
    }

    const modalElement = document.getElementById('previewModal');
    const modalBlockedElement = document.getElementById('previewBlockedModal');
    const player = document.getElementById('previewPlayer');
    const modal = modalElement ? new bootstrap.Modal(modalElement) : null;
    const blockedModal = modalBlockedElement ? new bootstrap.Modal(modalBlockedElement) : null;

    const getEmbedUrl = (url) => {
        if (!url) return '';
        const ytWatch = url.match(/(?:youtube\.com\/watch\?v=)([\w-]+)/i);
        const ytShort = url.match(/youtu\.be\/([\w-]+)/i);
        const videoId = ytWatch ? ytWatch[1] : ytShort ? ytShort[1] : null;
        if (videoId) {
            return `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
        }
        return url;
    };

    document.querySelectorAll('.lesson-view-btn').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const isPreviewable = btn.getAttribute('data-preview') === '1';
            const videoUrl = btn.getAttribute('data-video') || '';
            if (isPreviewable && videoUrl && modal) {
                player.src = getEmbedUrl(videoUrl);
                modal.show();
            } else if (blockedModal) {
                blockedModal.show();
            }
        });
    });

    if (modalElement) {
        modalElement.addEventListener('hidden.bs.modal', () => {
            player.src = '';
        });
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('student.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\online-om\resources\views/student/course-detail.blade.php ENDPATH**/ ?>