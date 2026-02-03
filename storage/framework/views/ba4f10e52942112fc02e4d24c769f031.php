<?php use Illuminate\Support\Str; ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="/om-front/css/custom-option.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Search -->
    <div class="container mt-6">
        <form class="d-flex rounded-pill shadow-sm p-3 search-1" role="search" method="get" action="<?php echo e(route('student.materials')); ?>">
            <input class="form-control bg-transparent text-center fs-1 fw-bold" type="search"
                   name="q"
                   value="<?php echo e($searchTerm ?? ''); ?>"
                   placeholder="Bạn muốn tìm tài liệu nào?" aria-label="Search"/>
            <input type="hidden" name="topic" value="<?php echo e($topicSlug ?? ''); ?>">
            <button class="btn px-0 me-2" type="submit"><i class="fa-solid fa-magnifying-glass fs-2"></i></button>
        </form>
        <div class="d-flex flex-wrap gap-2 mt-3 mobile-title">
            <a href="<?php echo e(route('student.materials')); ?>" class="btn fs-4 fst-italic py-0 border-0 <?php echo e(empty($topicSlug) ? 'fw-bold' : ''); ?>">Tất cả</a>
            <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('student.materials', array_filter(['topic' => $topic->slug, 'q' => $searchTerm ?? '']))); ?>"
                   class="btn fs-4 fst-italic py-0 border-0 <?php echo e(($topicSlug ?? '') === $topic->slug ? 'fw-bold' : ''); ?>">
                    #<?php echo e($topic->name); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <!-- Content -->
    <div class="container mt-5">
        <div class="row gx-5">
            <!-- Left docs list -->
            <div class="col-lg-9 d-flex flex-column">
                <?php $purchasedDocumentIds = $purchasedDocumentIds ?? collect(); ?>
                <?php $__empty_1 = true; $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="mb-4 row m-0 shadow-sm rounded-5 p-4">
                       
                        <div class="d-flex align-items-center gap-3 flex-wrap mb-2">
                            
                            <?php
                                $docLink = Str::startsWith($document->link, 'http') ? $document->link : asset($document->link);
                            ?>
                            <a class="fs-3 fw-bold mb-0 text-decoration-none text-dark" href="<?php echo e(route('student.documents.show', ['document' => $document->id])); ?>">
                                <?php echo e($document->title); ?>

                            </a>

                            <?php if($document->price <= 0): ?>
                                <a style="margin-left:20px;" class="btn fs-4 fst-italic py-0 text-decoration-none download-trigger"
                                   href="<?php echo e($docLink); ?>"
                                   data-download-link="<?php echo e($docLink); ?>">
                                    <img src="/om-front/img/Download from the Cloud.png" alt="" width="30px" class="me-1">
                                    Tải xuống
                                </a>
                            <?php else: ?>
                                <?php $isPurchased = $purchasedDocumentIds->contains($document->id); ?>
                                <?php if($isPurchased): ?>
                                    <button type="button"
                                            class="btn fs-4 fst-italic py-0 text-decoration-none text-dark purchased-document-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#purchasedInfoModal">
                                        <img src="/om-front/img/Download from the Cloud.png" alt="" width="30px" class="me-1">
                                        Xem tài liệu
                                    </button>
                                <?php else: ?>
                                    <a class="btn fs-4 fst-italic py-0 text-decoration-none" href="<?php echo e(route('student.documents.cart', ['document' => $document->id])); ?>">
                                        <img src="/om-front/img/Download from the Cloud.png" alt="" width="30px" class="me-1">
                                        Mua ngay
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                                                     <p class="fs-4 mb-1"><?php echo e($document->published_at ? $document->published_at->format('d/m/Y') : '—'); ?></p>


                        <div class="d-flex flex-wrap gap-2 ps-0">
                            <?php $__currentLoopData = $document->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="btn fs-4 fst-italic text-start py-0" href="<?php echo e(route('student.materials', ['topic' => $topic->slug])); ?>">
                                    #<?php echo e($topic->name); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="mt-3">
                            <p class="fs-4 mb-1 fw-bold">
                                <?php echo e($document->price > 0 ? 'Giá: ' . number_format($document->price, 0, ',', '.') . ' VNĐ' : 'Miễn phí'); ?>

                            </p>
                            
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="fs-4 text-muted">Chưa có tài liệu phù hợp.</p>
                <?php endif; ?>

                <div class="mt-4">
                    <?php echo e($documents->links()); ?>

                </div>
            </div>

            <!-- Right side small widgets -->
            <div class="col-lg-3 img-widget">
                <img src="/om-front/img/coaching.jpg" alt="" class="rounded-5 shadow-custom w-100">
                <img src="/om-front/img/khoa-hoc-50.jpg" alt="" class="rounded-5 shadow-custom w-100 mt-5">
            </div>
        </div>
    </div>

    <div class="modal fade" id="downloadWaitModal" tabindex="-1" aria-labelledby="downloadWaitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:100%;max-width:720px;">
            <div class="modal-content rounded-4 border-0 shadow-sm">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-3 fw-bold" id="downloadWaitModalLabel">Đang chuẩn bị tài liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body fs-4">
                    <p class="mb-2">Chờ <span id="downloadCountdown">30</span> giây để hệ thống tạo đường dẫn tải.</p>
                    <p class="text-muted mb-3">Không đóng cửa sổ này nếu bạn muốn nhận tài liệu.</p>
                    <div class="progress" style="height:6px;">
                        <div id="downloadProgress" class="progress-bar bg-primary" role="progressbar" style="width:0;transition:none;" aria-valuemin="0" aria-valuemax="30"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="purchasedInfoModal" tabindex="-1" aria-labelledby="purchasedInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-sm">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-3 fw-bold" id="purchasedInfoModalLabel">Tài liệu đã mua</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body fs-4">
                    Chúng tôi đã ghi nhận bạn từng thanh toán tài liệu này. Vui lòng liên hệ admin để hỗ trợ gửi lại đường link và tài liệu của bạn.
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modalEl = document.getElementById('downloadWaitModal');
        if (!modalEl) return;
        const countdownEl = modalEl.querySelector('#downloadCountdown');
        const progressEl = modalEl.querySelector('#downloadProgress');
        const downloadLinks = document.querySelectorAll('.download-trigger');
        const bsModal = new bootstrap.Modal(modalEl, { backdrop: 'static', keyboard: false });
        let countdownTimer = null;
        let targetUrl = null;

        const startCountdown = (url) => {
            let remaining = 30;
            countdownEl.textContent = remaining;
            progressEl.style.width = '0%';
            progressEl.style.transition = 'width 1s linear';
            targetUrl = url;
            countdownTimer = setInterval(() => {
                remaining -= 1;
                const safeRemaining = Math.max(remaining, 0);
                countdownEl.textContent = safeRemaining;
                const filled = ((30 - safeRemaining) / 30) * 100;
                progressEl.style.width = `${filled}%`;
                if (remaining < 0) {
                    clearInterval(countdownTimer);
                    countdownTimer = null;
                    bsModal.hide();
                    if (targetUrl) {
                        window.location.assign(targetUrl);
                    }
                    targetUrl = null;
                }
            }, 1000);
        };

        const resetCountdown = () => {
            if (countdownTimer) {
                clearInterval(countdownTimer);
                countdownTimer = null;
            }
            progressEl.style.width = '0%';
            targetUrl = null;
        };

        modalEl.addEventListener('hide.bs.modal', () => {
            if (countdownTimer) {
                resetCountdown();
            }
        });

        downloadLinks.forEach((link) => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const url = link.dataset.downloadLink;
                if (!url) return;
                resetCountdown();
                bsModal.show();
                startCountdown(url);
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('student.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\online-om\resources\views/student/materials.blade.php ENDPATH**/ ?>