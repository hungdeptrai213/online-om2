

<?php $__env->startSection('title', $document->title); ?>

<?php $__env->startSection('style'); ?>
    <style>
        .document-detail-modal {
           margin: 5.5rem auto 2.5rem;
        }

        .document-detail-header a {
            font-weight: 600;
            color: #1f2d3d;
        }

        .btn:disabled,
        .btn.disabled,
        fieldset:disabled .btn {
            color: var(--bs-btn-disabled-color);
            pointer-events: none;
            background-color: #0c3b2e;
        }

        .book-frame {
            background: #f4f3ef;
            border-radius: 24px;
            padding: 1.25rem 1.25rem 1.5rem;
            border: 1px solid #dbd4c9;
            position: relative;
            overflow: hidden;
        }

        .book-frame:fullscreen {
            width: 100%;
            height: 100vh;
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 0.75rem;
        }

        .book-frame:fullscreen .flipbook-stage {
            flex: 1 1 auto;
            min-height: 0;
            max-height: none;
        }

        .book-frame:-webkit-full-screen {
            width: 100%;
            height: 100vh;
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 0.75rem;
        }

        .book-frame:-webkit-full-screen .flipbook-stage {
            flex: 1 1 auto;
            min-height: 0;
            max-height: none;
        }

        .flipbook-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 0.75rem;
        }

        .flipbook-title {
            font-weight: 600;
            color: #1f2d3d;
        }

        .flipbook-page-jump {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: #2f2a25;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .page-jump-input {
            width: 64px;
            padding: 4px 8px;
            border-radius: 999px;
            border: 1px solid #d7c9b5;
            text-align: center;
            font-weight: 600;
            background: #fff;
            color: #2f2a25;
            font-size: 0.9rem;
        }

        .flipbook-controls {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 0.65rem 0.9rem;
            margin-top: 0.75rem;
        }

        .flipbook-controls .nav-group {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.4rem 0.6rem;
        }

        .flipbook-controls .nav-group .btn {
            min-width: 120px;
            font-weight: 600;
            border-radius: 999px;
        }

        .flipbook-controls .tool-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .flipbook-toolbar {
            display: grid;
            grid-template-columns: 1fr auto auto;
            align-items: center;
            gap: 0.75rem 1.25rem;
            margin-bottom: 0.75rem;
        }

        .flipbook-toolbar .nav-group {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.5rem 0.75rem;
        }

        .flipbook-toolbar .nav-group .btn {
            min-width: 130px;
            font-weight: 600;
            border-radius: 999px;
        }

        .flipbook-toolbar .page-counter {
            font-weight: 600;
            color: #2f2a25;
        }

        .flipbook-status {
            font-size: 0.95rem;
            color: #5d554d;
            white-space: nowrap;
        }

        .flipbook-stage {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            padding: 18px;
            min-height: 620px;
            max-height: calc(100vh - 180px);
            overflow: hidden;
        }

        .flip-book {
            display: none;
            background-size: cover;
            margin: 0 auto;
            position: relative;
            max-width: 100%;
            max-height: 100%;
        }

        .flip-book.ready {
            display: block;
        }

        .flip-book::after {
            content: "";
            position: absolute;
            top: 12px;
            bottom: 12px;
            left: 50%;
            width: 6px;
            transform: translateX(-50%);
            background: linear-gradient(180deg,
                    rgba(0, 0, 0, 0) 0%,
                    rgba(0, 0, 0, 0.18) 25%,
                    rgba(0, 0, 0, 0.28) 50%,
                    rgba(0, 0, 0, 0.18) 75%,
                    rgba(0, 0, 0, 0) 100%);
            opacity: 0.6;
            pointer-events: none;
            mix-blend-mode: multiply;
            box-shadow: 0 0 14px rgba(0, 0, 0, 0.25);
        }

        .page {
            padding: 0;
            background-color: #fdfbf7;
            color: hsl(35, 35%, 35%);
            border: solid 1px hsl(35, 20%, 70%);
            overflow: hidden;
        }

        .page .page-content {
            width: 100%;
            height: 100%;
            display: block;
            padding: 0;
        }

        .page .page-image {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .page .page-footer,
        .page .page-header,
        .page .page-text {
            display: none;
        }

        .page.--left {
            border-right: 0;
            box-shadow: inset -7px 0 30px -7px rgba(0, 0, 0, 0.4);
        }

        .page.--right {
            border-left: 0;
            box-shadow: inset 7px 0 30px -7px rgba(0, 0, 0, 0.4);
        }

        .page.--right .page-footer {
            text-align: right;
        }

        .page.hard {
            background-color: hsl(35, 50%, 90%);
            border: solid 1px hsl(35, 20%, 50%);
        }

        .page.page-cover {
            background-color: hsl(35, 45%, 80%);
            color: hsl(35, 35%, 35%);
            border: solid 1px hsl(35, 20%, 50%);
            padding: 0;
        }

        .page.page-cover .page-content {
            height: 100%;
            width: 100%;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            text-shadow: 0 4px 12px rgba(0, 0, 0, 0.35);
            font-weight: 700;
            font-size: 150%;
            padding: 24px;
            box-sizing: border-box;
        }

        .page.page-cover.page-cover-top {
            box-shadow: inset 0px 0 30px 0px rgba(36, 10, 3, 0.5), -2px 0 5px 2px rgba(0, 0, 0, 0.4);
        }

        .page.page-cover.page-cover-bottom {
            box-shadow: inset 0px 0 30px 0px rgba(36, 10, 3, 0.5), 10px 0 8px 0px rgba(0, 0, 0, 0.4);
        }

        .book-lock-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.9), rgba(240, 236, 230, 0.95));
            backdrop-filter: blur(4px);
            color: #2f2a25;
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            border-radius: 14px;
            z-index: 10;
            padding: 18px;
        }

        .book-lock-overlay.show {
            display: flex;
        }

        .book-lock-overlay .close-lock {
            position: absolute;
            top: 12px;
            right: 16px;
            background: rgba(255, 255, 255, 0.96);
            border: none;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            font-weight: 700;
            cursor: pointer;
            color: #222;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .tool-btn,
        .fullscreen-btn {
            border-radius: 50%;
            width: 36px;
            height: 36px;
            padding: 0;
            display: grid;
            place-items: center;
            line-height: 1;
            background: #fff;
            border: 1px solid #d7c9b5;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12);
            transition: transform 120ms ease, box-shadow 120ms ease;
        }

        .tool-btn:hover,
        .fullscreen-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.16);
        }

        .pdf-message {
            margin-top: 0.85rem;
            text-align: center;
            color: #5d554d;
            font-weight: 500;
        }

        .document-body {
            margin-top: 2rem;
        }

        .document-info {
            background: #f9f6f1;
            border-radius: 18px;
            padding: 1.5rem;
            border: 1px solid #e2dcd2;
        }

        .document-info h3,
        .document-info h4 {
            font-weight: 700;
            color: #1f2d3d;
        }

        .document-info p {
            color: #4f463f;
        }

        .related-documents ul {
            list-style: disc;
            padding-left: 1.25rem;
            margin-bottom: 0;
        }

        .related-documents a {
            color: #0c3b2e;
            text-decoration: none;
        }

        .related-documents a:hover {
            text-decoration: underline;
        }

        .info-panel {
            background-color: hsla(0, 0%, 74%, 0.2);
            border-radius: 20px;
            padding: 1.75rem;
            box-shadow: 0 20px 40px rgba(15, 15, 15, 0.08);
            border: 1px solid #ece6d8;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .info-panel img {
            width: 100%;
            border-radius: 16px;
            object-fit: cover;

        }

        .info-panel .topic-chip {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            border-radius: 999px;
            background: #f1ede5;
            color: #5f4f3e;
            font-size: 0.9rem;
        }

        .info-panel .info-meta {
            font-size: 0.95rem;
            color: #6b5e51;
        }

        .info-panel .btn {
            border-radius: 12px;
            padding: 0.85rem 1rem;
            font-weight: 600;
            background-color: #0c3b2e;
        }

        @media (max-width: 991px) {
            .document-detail-modal {
                padding: 1.5rem;
            }

            .book-frame {
                padding: 1.5rem;
            }

            .flipbook-head {
                flex-direction: column;
                align-items: flex-start;
            }

            .flipbook-page-jump {
                justify-content: flex-start;
                width: 100%;
            }

            .flipbook-controls {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-panel {
                padding: 1.25rem;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $thumb = $document->thumbnail;
        $thumbUrl =
            $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                ? $thumb
                : ($thumb
                    ? asset($thumb)
                    : asset('om-front/img/Open Document.png'));
        $descriptionText = trim((string) ($document->description ?? ''));
        $introText = $descriptionText !== '' ? \Illuminate\Support\Str::limit($descriptionText, 260) : null;
    ?>
    <div class="container container-fluid px-2 px-md-3 px-lg-4">
        <div class="document-detail-modal">
            <div class="document-detail-header d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
                <div>
                    <p class="text-uppercase text-muted mb-1" style="letter-spacing:0.08em;">Tài liệu chuyên sâu</p>
                    <h1 class="fs-2 fw-bold mb-0"><?php echo e($document->title); ?></h1>
                </div>
                <a href="<?php echo e(route('student.materials')); ?>" class="btn btn-outline-dark" style="border-radius:999px;">← Trở về
                    kho tài liệu</a>
            </div>
            <div class="row gx-5 gy-5">
                <div class="col-12">
                    <div class="book-frame" id="bookFrame">
                        <div class="flipbook-head">
                            <div class="flipbook-title"><?php echo e($document->title); ?></div>
                        </div>
                        <div class="flipbook-stage">
                            <div class="book-lock-overlay" id="lockOverlay">
                                <button type="button" class="close-lock" aria-label="Đóng">×</button>
                                <p class="fs-4 mb-2">Trang đã bị khóa, hãy mua để xem toàn bộ nội dung.</p>
                                <a href="<?php echo e(route('student.documents.cart', ['document' => $document->id])); ?>"
                                    class="btn btn-success mt-2 px-4">Mua tài liệu</a>
                            </div>
                            <div class="flip-book" id="flipBook"></div>
                        </div>
                        <div class="flipbook-controls">
                            <div class="nav-group">
                                <button type="button" class="tool-btn btn-prev" aria-label="Trang trước">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="15 18 9 12 15 6" />
                                    </svg>
                                </button>
                                <button type="button" class="tool-btn btn-next" aria-label="Trang sau">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="9 18 15 12 9 6" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flipbook-page-jump">
                                <span>Trang</span>
                                <input id="pageJumpInput" class="page-jump-input" type="number" min="1" value="1"
                                    inputmode="numeric" />
                                <span>/</span>
                                <span class="page-total">-</span>
                            </div>
                            <div class="tool-group">
                                <button type="button" class="tool-btn" id="zoomOutBtn" aria-label="Thu nhỏ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8" />
                                        <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                        <line x1="8" y1="11" x2="14" y2="11" />
                                    </svg>
                                </button>
                                <button type="button" class="tool-btn" id="zoomInBtn" aria-label="Phóng to">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8" />
                                        <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                        <line x1="11" y1="8" x2="11" y2="14" />
                                        <line x1="8" y1="11" x2="14" y2="11" />
                                    </svg>
                                </button>
                                <button id="fullscreenBtn" class="tool-btn" aria-label="Toàn màn hình">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M4 9V5a1 1 0 0 1 1-1h4" />
                                        <path d="M20 9V5a1 1 0 0 0-1-1h-4" />
                                        <path d="M4 15v4a1 1 0 0 0 1 1h4" />
                                        <path d="M20 15v4a1 1 0 0 1-1 1h-4" />
                                        <polyline points="9 4 4 9" />
                                        <polyline points="15 4 20 9" />
                                        <polyline points="4 15 9 20" />
                                        <polyline points="20 15 15 20" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div id="pdfMessage" class="pdf-message">Đang tải tài liệu...</div>
                        
                    </div>
                </div>
            </div>
            <div class="row gx-5 gy-5 document-body">
                <div class="col-lg-8">
                    <div class="document-info">
                        <h3 class="mb-3">Giới thiệu tài liệu</h3>
                        <p class="mb-4">
                            <?php echo e($introText ?: 'Đang cập nhật giới thiệu tài liệu.'); ?>

                        </p>
                        <h4 class="mb-3">Mô tả tài liệu</h4>
                        <p class="mb-4">
                            <?php echo nl2br(e($descriptionText ?: 'Đang cập nhật mô tả chi tiết.')); ?>

                        </p>
                        <h4 class="mb-2">Giảng viên</h4>
                        <p class="fw-semibold mb-1"><?php echo e($document->lecturer_name ?: 'Đang cập nhật'); ?></p>
                        <p class="mb-0"><?php echo nl2br(e($document->lecturer_bio ?: 'Đang cập nhật thông tin giảng viên.')); ?></p>
                    </div>
                    <div class="related-documents mt-4">
                        <h4 class="mb-2">Tài liệu liên quan</h4>
                        <?php if($relatedDocuments->isNotEmpty()): ?>
                            <ul>
                                <?php $__currentLoopData = $relatedDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('student.documents.show', ['document' => $related->id])); ?>">
                                            <?php echo e($related->title); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted mb-0">Chưa có tài liệu liên quan.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-panel shadow">
                        <img src="<?php echo e($thumbUrl); ?>" alt="Ảnh đại diện <?php echo e($document->title); ?>">
                        <div>
                            <p class="fs-5 fw-semibold mb-1"><?php echo e($document->title); ?></p>
                            <p class="info-meta mb-1">Ngày phát hành:
                                <?php echo e($document->published_at ? $document->published_at->format('d/m/Y') : 'Chưa rõ'); ?></p>
                            <p class="fs-5 mb-1">
                                <?php echo e($document->price > 0 ? 'Giá: ' . number_format($document->price, 0, ',', '.') . ' VNĐ' : 'Miễn phí'); ?>

                            </p>
                            <p class="text-muted" style="font-size:0.95rem; min-height:68px;">
                                <?php echo e($document->description ?: 'Đang cập nhật mô tả chi tiết.'); ?>

                            </p>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <?php $__currentLoopData = $document->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="topic-chip">#<?php echo e($topic->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="d-grid">
                            <?php if($document->price > 0): ?>
                                <?php if($isPurchased): ?>
                                    <a href="<?php echo e($document->link); ?>" target="_blank" rel="noreferrer"
                                        class="btn btn-success">Tải tài liệu bạn đã mua</a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('student.documents.cart', ['document' => $document->id])); ?>"
                                        class="btn btn-primary">Mua tài liệu</a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo e($document->link); ?>" id="freeDownloadBtn"
                                    data-download-link="<?php echo e($originalLink); ?>" class="btn btn-success">Tải miễn phí</a>
                            <?php endif; ?>
                        </div>
                        <?php if($isPurchased && $document->price > 0): ?>
                            <p class="text-success small mb-0">Bạn đã thanh toán tài liệu này. Kiểm tra email để nhận file
                                trực tiếp và hướng dẫn tải.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<div class="modal fade" id="downloadWaitModal" tabindex="-1" aria-labelledby="downloadWaitModalLabel"
    aria-hidden="true">
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
                    <div id="downloadProgress" class="progress-bar bg-primary" role="progressbar"
                        style="width:0;transition:none;" aria-valuemin="0" aria-valuemax="30"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/page-flip/page-flip.css')); ?>">
    <script>
        // Ưu tiên file local, fallback qua 3 CDN nếu lỗi mạng
        (function loadPageFlip() {
            const sources = [
                '<?php echo e(asset('vendor/page-flip/page-flip.browser.js')); ?>',
                'https://unpkg.com/page-flip@2.0.7/dist/js/page-flip.browser.js',
                'https://cdnjs.cloudflare.com/ajax/libs/page-flip/2.0.7/js/page-flip.browser.js',
                'https://cdn.jsdelivr.net/npm/page-flip@2.0.7/dist/js/page-flip.browser.js'
            ];
            const inject = (idx = 0) => {
                if (idx >= sources.length) return;
                const s = document.createElement('script');
                s.src = sources[idx];
                s.defer = true;
                s.onerror = () => inject(idx + 1);
                document.head.appendChild(s);
            };
            inject();
        })();
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const pdfMessageEl = document.getElementById('pdfMessage');
            const prevBtn = document.querySelector('.btn-prev');
            const nextBtn = document.querySelector('.btn-next');
            const pageInputEl = document.getElementById('pageJumpInput');
            const pageTotalEl = document.querySelector('.page-total');
            const pdfUrl = <?php echo json_encode($pdfUrl, 15, 512) ?>;
            const coverUrl = <?php echo json_encode($thumbUrl, 15, 512) ?>;
            const flipBookEl = document.getElementById('flipBook');
            const bookFrame = document.getElementById('bookFrame');
            const lockOverlay = document.getElementById('lockOverlay');
            const lockCloseBtn = lockOverlay?.querySelector('.close-lock');
            const fullscreenBtn = document.getElementById('fullscreenBtn');
            const zoomInBtn = document.getElementById('zoomInBtn');
            const zoomOutBtn = document.getElementById('zoomOutBtn');
            const isLocked = <?php echo e($document->price > 0 && !$isPurchased ? 'true' : 'false'); ?>;
            const maxPreviewPages = 4;
            const freeDownloadBtn = document.getElementById('freeDownloadBtn');
            const downloadModalEl = document.getElementById('downloadWaitModal');
            const countdownEl = document.getElementById('downloadCountdown');
            const progressEl = document.getElementById('downloadProgress');
            const bsDownloadModal = downloadModalEl ? new bootstrap.Modal(downloadModalEl, {
                backdrop: 'static',
                keyboard: false
            }) : null;
            let countdownTimer = null;
            let zoomLevel = 1;
            const zoomMin = 0.8;
            const zoomMax = 1.6;
            const zoomStep = 0.1;

            const applyZoom = (value) => {
                zoomLevel = Math.min(zoomMax, Math.max(zoomMin, value));
                flipBookEl.style.transform = `scale(${zoomLevel.toFixed(2)})`;
                flipBookEl.style.transformOrigin = 'center center';
            };

            const startCountdown = (url) => {
                if (!bsDownloadModal) return window.location.assign(url);
                let remaining = 30;
                countdownEl.textContent = remaining;
                progressEl.style.width = '0%';
                progressEl.style.transition = 'width 1s linear';
                bsDownloadModal.show();
                countdownTimer = setInterval(() => {
                    remaining -= 1;
                    const safeRemaining = Math.max(remaining, 0);
                    countdownEl.textContent = safeRemaining;
                    const filled = ((30 - safeRemaining) / 30) * 100;
                    progressEl.style.width = `${filled}%`;
                    if (remaining < 0) {
                        clearInterval(countdownTimer);
                        countdownTimer = null;
                        bsDownloadModal.hide();
                        window.location.assign(url);
                    }
                }, 1000);
            };

            if (freeDownloadBtn) {
                freeDownloadBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const target = freeDownloadBtn.dataset.downloadLink;
                    if (!target) return;
                    startCountdown(target);
                });
            }

            if (!pdfUrl) {
                pdfMessageEl.textContent =
                    'Không tìm thấy đường dẫn PDF hợp lệ hoặc file chưa được chia sẻ công khai.';
                if (pageInputEl) pageInputEl.disabled = true;
                prevBtn.disabled = true;
                nextBtn.disabled = true;
                zoomInBtn?.setAttribute('disabled', 'disabled');
                zoomOutBtn?.setAttribute('disabled', 'disabled');
                return;
            }

            const CDN_JS = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js';
            const CDN_WORKER = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
            const FALLBACK_JS = 'https://unpkg.com/pdfjs-dist@3.11.174/build/pdf.min.js';
            const FALLBACK_WORKER = 'https://unpkg.com/pdfjs-dist@3.11.174/build/pdf.worker.min.js';

            const loadPdfJs = () => new Promise((resolve, reject) => {
                if (window.pdfjsLib?.GlobalWorkerOptions) {
                    return resolve({
                        lib: window.pdfjsLib,
                        worker: CDN_WORKER
                    });
                }
                const script = document.createElement('script');
                script.src = CDN_JS;
                script.onload = () => {
                    if (window.pdfjsLib?.GlobalWorkerOptions) {
                        return resolve({
                            lib: window.pdfjsLib,
                            worker: CDN_WORKER
                        });
                    }
                    reject(new Error('pdfjsLib thiếu sau khi tải CDN'));
                };
                script.onerror = () => {
                    const fallback = document.createElement('script');
                    fallback.src = FALLBACK_JS;
                    fallback.onload = () => {
                        if (window.pdfjsLib?.GlobalWorkerOptions) {
                            return resolve({
                                lib: window.pdfjsLib,
                                worker: FALLBACK_WORKER
                            });
                        }
                        reject(new Error('pdfjsLib thiếu sau khi tải fallback'));
                    };
                    fallback.onerror = () => reject(new Error('Không tải được thư viện pdf.js'));
                    document.head.appendChild(fallback);
                };
                document.head.appendChild(script);
            });

            let pdfDoc = null;
            let pageFlip = null;
            let lockPageIndex = null;
            const pageMeta = [];

            const getPageFlipClass = () => {
                const lib = window.St || window.pageflip || {};
                return lib.PageFlip || lib.PageFlipBrowser || null;
            };

            const waitForPageFlipClass = (timeout = 12000) => new Promise((resolve, reject) => {
                const start = Date.now();
                const lookup = () => {
                    const cls = getPageFlipClass();
                    if (cls) return resolve(cls);
                    if (Date.now() - start >= timeout) {
                        return reject(new Error(
                            'Không tải được PageFlip để hiển thị hiệu ứng lật trang.'));
                    }
                    requestAnimationFrame(lookup);
                };
                lookup();
            });

            const displayTotalPages = () => pageMeta.filter((p) => p.type === 'page').length;

            const displayPageNumber = (idx) => {
                let count = 0;
                for (let i = 0; i <= idx && i < pageMeta.length; i++) {
                    if (pageMeta[i].type === 'page') count += 1;
                }
                return Math.max(count, 1);
            };

            const getPageIndexByNumber = (number) => {
                if (!number) return -1;
                return pageMeta.findIndex((p) => p.type === 'page' && p.number === number);
            };

            const updateNavigator = (pageIdx) => {
                if (!pageFlip) {
                    if (pageInputEl) pageInputEl.value = '';
                    pageTotalEl.textContent = '—';
                    prevBtn.disabled = true;
                    nextBtn.disabled = true;
                    return;
                }
                const idx = pageIdx ?? pageFlip.getCurrentPageIndex();
                const currentNumber = displayPageNumber(idx);
                if (pageInputEl) {
                    pageInputEl.value = currentNumber;
                    pageInputEl.max = displayTotalPages();
                }
                pageTotalEl.textContent = displayTotalPages();
                const lastAllowed = lockPageIndex ?? (pageMeta.length - 1);
                prevBtn.disabled = idx <= 0;
                nextBtn.disabled = idx >= lastAllowed;
            };

            const jumpToPage = (value) => {
                if (!pageFlip) return;
                const total = displayTotalPages();
                if (!total) return;
                const safeValue = Math.min(Math.max(parseInt(value, 10) || 1, 1), total);
                const targetIndex = getPageIndexByNumber(safeValue);
                if (targetIndex >= 0) {
                    pageFlip.flip(targetIndex);
                    updateNavigator(targetIndex);
                } else if (pageInputEl) {
                    pageInputEl.value = safeValue;
                }
            };

            if (pageInputEl) {
                pageInputEl.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        jumpToPage(pageInputEl.value);
                    }
                });
                pageInputEl.addEventListener('blur', () => {
                    if (pageInputEl.value) jumpToPage(pageInputEl.value);
                });
            }

            const enterFullscreen = () => {
                if (document.fullscreenElement) {
                    document.exitFullscreen().catch(() => {});
                } else {
                    bookFrame.requestFullscreen?.().catch(() => {});
                }
            };

            fullscreenBtn?.addEventListener('click', enterFullscreen);
            lockCloseBtn?.addEventListener('click', () => lockOverlay.classList.remove('show'));

            prevBtn?.addEventListener('click', () => {
                if (!pageFlip) return;
                pageFlip.flipPrev();
            });

            nextBtn?.addEventListener('click', () => {
                if (!pageFlip) return;
                pageFlip.flipNext();
            });

            zoomInBtn?.addEventListener('click', () => {
                applyZoom(zoomLevel + zoomStep);
            });

            zoomOutBtn?.addEventListener('click', () => {
                applyZoom(zoomLevel - zoomStep);
            });

            const renderPageToImage = async (doc, pageNumber, maxWidth, maxHeight) => {
                const page = await doc.getPage(pageNumber);
                const viewport = page.getViewport({
                    scale: 1
                });
                const scale = Math.min(maxWidth / viewport.width, maxHeight / viewport.height, 1.8);
                const scaledViewport = page.getViewport({
                    scale
                });
                const tempCanvas = document.createElement('canvas');
                const ctx = tempCanvas.getContext('2d');
                tempCanvas.width = scaledViewport.width;
                tempCanvas.height = scaledViewport.height;
                await page.render({
                    canvasContext: ctx,
                    viewport: scaledViewport
                }).promise;
                return {
                    dataUrl: tempCanvas.toDataURL('image/png'),
                    width: scaledViewport.width,
                    height: scaledViewport.height,
                };
            };

            loadPdfJs()
                .then(({
                    lib,
                    worker
                }) => {
                    lib.GlobalWorkerOptions.workerSrc = worker;
                    return lib.getDocument({
                        url: pdfUrl,
                        withCredentials: false
                    }).promise;
                })
                .then(async (doc) => {
                    pdfDoc = doc;
                    const total = doc.numPages;
                    const previewPages = isLocked ? Math.min(maxPreviewPages, total) : total;

                    const stage = document.querySelector('.flipbook-stage');
                    const stageWidth = (stage?.clientWidth || bookFrame.clientWidth || 900) - 30;
                    const stageHeight = stage?.clientHeight || Math.min(window.innerHeight * 0.9, 1300);
                    const viewerWidth = Math.max(320, stageWidth);
                    const viewerHeight = Math.max(420, Math.min(stageHeight, window.innerHeight * 0.88));
                    let baseWidth = viewerWidth;
                    let baseHeight = Math.round(viewerWidth * 1.4);

                    for (let i = 1; i <= previewPages; i++) {
                        const rendered = await renderPageToImage(doc, i, viewerWidth, viewerHeight);
                        if (i === 1) {
                            baseWidth = Math.min(viewerWidth, Math.round(rendered.width));
                            baseHeight = Math.min(viewerHeight, Math.round(rendered.height));
                        }
                        pageMeta.push({
                            type: 'page',
                            src: rendered.dataUrl,
                            alt: `Trang ${i}`,
                            number: i
                        });
                    }

                    if (isLocked && total > previewPages) {
                        lockPageIndex = pageMeta.length;
                        pageMeta.push({
                            type: 'lock'
                        });
                    }

                    flipBookEl.innerHTML = '';
                    const pageNodes = pageMeta.map((meta) => {
                        const div = document.createElement('div');
                        div.className = 'page';
                        div.style.width = `${baseWidth}px`;
                        div.style.height = `${baseHeight}px`;

                        if (meta.type === 'lock') {
                            div.innerHTML = `
                                <div class="page-content" style="display:flex;align-items:center;justify-content:center;height:100%;background:linear-gradient(135deg,#f8f3eb,#ece5da);color:#2f2a25;padding:18px;text-align:center;flex-direction:column;gap:10px;">
                                    <span class="fw-semibold">Trang đã bị khóa. Mua để xem toàn bộ.</span>
                                    <a href="<?php echo e(route('student.documents.cart', ['document' => $document->id])); ?>" class="btn btn-success btn-sm px-3 mt-1">Mua tài liệu</a>
                                </div>`;
                        } else {
                            div.innerHTML = `
                                <div class="page-content">
                                    <div class="page-image" style="background-image:url('${meta.src}');"></div>
                                </div>
                            `;
                        }
                        flipBookEl.appendChild(div);
                        return div;
                    });

                    const PageFlipClass = await waitForPageFlipClass();

                    pageFlip = new PageFlipClass(flipBookEl, {
                        width: baseWidth,
                        height: baseHeight,
                        size: 'stretch',
                        minWidth: 315,
                        maxWidth: viewerWidth,
                        minHeight: 420,
                        maxHeight: viewerHeight,
                        maxShadowOpacity: 0.5,
                        showCover: false,
                        useMouseEvents: true,
                        mobileScrollSupport: false,
                        showPageCorners: true,
                    });

                    pageFlip.loadFromHTML(pageNodes);

                    pageFlip.on('flip', (e) => {
                        if (lockPageIndex !== null && e.data >= lockPageIndex) {
                            lockOverlay.classList.add('show');
                            const stopIndex = Math.min(lockPageIndex, pageMeta.length - 1);
                            if (pageFlip.getCurrentPageIndex() !== stopIndex) {
                                pageFlip.flip(stopIndex);
                            }
                            updateNavigator(stopIndex);
                            return;
                        }
                        lockOverlay.classList.remove('show');
                        updateNavigator(e.data);
                    });

                    pdfMessageEl.textContent = 'Tải tài liệu thành công.';
                    flipBookEl.classList.add('ready');
                    pageTotalEl.textContent = displayTotalPages();
                    if (pageInputEl) pageInputEl.max = displayTotalPages();
                    applyZoom(1);
                    updateNavigator(0);
                })
                .catch((err) => {
                    console.error(err);
                    pdfMessageEl.textContent =
                        'Không thể khởi tạo hoặc tải tài liệu PDF. Kiểm tra kết nối và đảm bảo file công khai.';
                    prevBtn.disabled = true;
                    nextBtn.disabled = true;
                    if (pageInputEl) pageInputEl.value = '';
                    pageTotalEl.textContent = '—';
                    zoomInBtn?.setAttribute('disabled', 'disabled');
                    zoomOutBtn?.setAttribute('disabled', 'disabled');
                });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('student.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\online-om\resources\views/student/documents/show.blade.php ENDPATH**/ ?>