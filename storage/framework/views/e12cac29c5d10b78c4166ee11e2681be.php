

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="/om-front/css/custom-option.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $rawPrice = $course ? (float) ($course->sale_price ?? $course->price ?? 0) : 0;
        $displayPrice = $rawPrice > 0 ? number_format($rawPrice, 0, ',', '.') . ' VNĐ' : 'Mi?n phí';
        $transferNoteSafe = $transferNote ?? 'mh';
    ?>
    <!-- Content -->
    <div class="container mt-6">
        <div class="row gx-lg-4 gx-xl-5 justify-content-between thong-tin-khoa-hoc">
            <!-- Left -->
            <div class="col-lg-8 mb-5">
                <p class="fs-1 mb-1 fw-bold text-sm-center text-md-left"># Thông tin giỏ hàng</p>
                <div class="table-responsive-md">
                    <table class="table mt-5 align-middle fs-2 fw-bold text-center cart-table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Khóa học</th>
                                <th scope="col" class="text-nowrap">Thành tiền</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="cartBody">
                            <?php if($course): ?>
                                <?php
                                    $thumb = $course->thumbnail;
                                    $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                                        ? $thumb
                                        : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
                                ?>
                                <tr id="cartRow">
                                    <th scope="row">1.</th>
                                    <td class="text-start">
                                        <div class="d-flex align-items-center">
                                            <img width="140" src="<?php echo e($thumbUrl); ?>" alt="<?php echo e($course->title); ?>" class="my-3 rounded-4 shadow-sm me-3">
                                            <span class="fs-3 course-title"><?php echo e($course->title); ?></span>
                                        </div>
                                    </td>
                                    <td class="text-nowrap price-cell" id="cartPrice"><?php echo e($displayPrice); ?></td>
                                    <td>
                                        <a class="btn btn-warning fs-4 rounded-4 fw-bold px-4 shadow-sm mt-3 mt-md-0" href="<?php echo e(route('student.cart')); ?>" role="button">Xóa</a>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <tr id="emptyRow">
                                    <td colspan="4" class="py-4 text-muted">Chưa có khóa học nào trong giỏ.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php if($course): ?>
                    <p class="fw-bold fs-2 mt-3 text-sm-center text-md-end" id="cartTotal">Tổng: <?php echo e($displayPrice); ?></p>
                <?php endif; ?>

            </div>

            <!-- Right -->
            <div class="col-lg-3 d-flex flex-column mb-6">
                <p class="fs-1 mb-3 fw-bold text-center"># Thanh toán</p>
                <div
                    class="custom-bg-5 p-sm-3 p-md-4  p-lg-4 py-lg-5 d-flex justify-content-center flex-column rounded-5 shadow">
                    <p class="text-center fs-3 fw-bold">Tổng cộng</p>
                    <p class="text-center fs-3 fw-bold mb-0" id="summaryTotal"><?php echo e($course ? $displayPrice : '0 VNĐ'); ?></p>
                    <p class="text-center fs-4 fst-italic" id="summaryCount">(<?php echo e($course ? '1 khóa học' : 'Chưa có khóa h?c'); ?>)</p>

                    <?php if($course): ?>
                        <button
                            onclick="checkPaid(<?php echo e($rawPrice); ?>, '<?php echo e($transferNoteSafe); ?>', this, false)"
                            class="btn btn-primary fs-3 rounded-4 fw-bold mt-auto mb-4 mx-auto d-sm-none d-md-block d-lg-none check-paid-btn">Xác nhận đã thanh toán</button>

                        <button
                            onclick="checkPaid(<?php echo e($rawPrice); ?>, '<?php echo e($transferNoteSafe); ?>', this, false)"
                            class="btn btn-primary fs-3 rounded-4 fw-bold mt-auto mb-4 d-sm-block d-md-none d-lg-block check-paid-btn">Xác nhận đã thanh toán</button>
                    <?php endif; ?>


                    <p class="text-center fs-3 mb-0">Cách 1:</p>
                    <?php if($course): ?>
                        <p class="text-center fs-3">Thanh toán theo mã QR</p>
                        <div class="d-flex justify-content-center mb-3">
                            <img class="w-50 mx-auto d-sm-block d-lg-none"
                                src="https://img.vietqr.io/image/mb-163448866-compact2.jpg?amount=<?php echo e($rawPrice); ?>&addInfo=<?php echo e($transferNoteSafe); ?>" alt="">
                            <img class="w-75 mx-auto d-sm-none d-lg-block"
                                src="https://img.vietqr.io/image/mb-163448866-compact2.jpg?amount=<?php echo e($rawPrice); ?>&addInfo=<?php echo e($transferNoteSafe); ?>" alt="">
                        </div>
                    <?php else: ?>
                        <p class="text-center fs-4 text-muted mb-3">Thêm khóa học để nhận mã QR thanh toán.</p>
                    <?php endif; ?>
                    <hr class="opacity-100 w-25 ms-auto me-auto mt-4">
                    <p class="text-center fs-3 mb-0">Cách 2:</p>
                    <p class="text-center fs-3 mb-0">Thanh toán chuyển khoản</p>
                    <p class="text-center fs-5 mb-0 fw-bold">MB Bank - 163448866 - Phạm Ngọc Hùng</p>
                    <p class="text-center fs-4 mb-0">Nội dung chuyển khoản: <?php echo e($transferNoteSafe); ?></p>
                    <p class="text-center fs-4 mb-0">Lưu ý kiểm tra đúng số tiền và nội dung chuyển khoản.</p>
                    <hr class="opacity-100 w-25 mx-auto mt-4">
                    <p class="text-center fs-5 mb-0 fst-italic">Nếu sau 15 phút bạn vẫn chưa nhận được khóa học vui lòng
                        liên hệ hỗ trợ</p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<div class="modal fade" id="paymentResultModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 40%; width: 90%;">
        <div class="modal-content border-0">
            <div id="paymentResultBody" class="modal-body text-center text-white fw-bold fs-3 rounded-top">
                <!-- message -->
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<script>
const CHECK_URL = 'https://script.google.com/macros/s/AKfycbw7di2IkMECJx2aYSN6lBtAyIX5bU44PeCWc56UBuDdNoiIbRvlgauTZWLm4AX2VpBYmA/exec';
const courseDetailUrl = <?php echo json_encode($course ? route('student.course-detail', ['course' => $course->id]) : route('student.home'), 512) ?>;
const confirmUrl = <?php echo json_encode($course ? route('student.cart.confirm') : null, 15, 512) ?>;
const csrfToken = '<?php echo e(csrf_token()); ?>';
const currentCourseId = <?php echo e($course ? $course->id : 'null'); ?>;

async function checkPaid(amount, description, btn = null, isAuto = false) {
    if (!amount || !description) {
        alert('Thi?u thông tin thanh toán.');
        return;
    }
    if (!confirmUrl) {
        alert('Không tìm thấy đường dẫn xác nhận thanh toán.');
        return;
    }
    if (!isAuto) {
        showChecking('Đang kiểm tra thanh toán...');
        setButtonLoading(btn, true);
    }
    try {
        const params = new URLSearchParams({ amount, description });
        const res = await fetch(`${CHECK_URL}?${params.toString()}`, { method: 'GET' });
        if (!res.ok) throw new Error('Kiểm tra thanh toán thất bại.');
        const data = await res.json();
        const matched = isPaymentMatched(data, amount, description);
        if (matched) {
            if (currentCourseId) {
                await finalizePurchase(currentCourseId, amount, description);
            }
            clearCartUI();
            showPaymentResult(true, 'Thanh toán thành công! Bạn sẽ được chuyển tới khóa học.');
            setTimeout(() => { window.location.href = courseDetailUrl; }, 1200);
        } else {
            if (!isAuto) {
                showPaymentResult(false, 'Thanh toán chưa được xác nhận. Vui lòng thử lại sau.');
            }
        }
    } catch (error) {
        if (!isAuto) {
            showPaymentResult(false, 'Thanh toán thất bại: ' + error.message);
        }
    }
    if (!isAuto) {
        setButtonLoading(btn, false);
    }
}

async function finalizePurchase(courseId, amount, description) {
    const res = await fetch(confirmUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            course_id: courseId,
            amount,
            payment_note: description,
            provider: 'manual',
            method: 'bank_transfer',
            transaction_id: description,
        }),
    });
    const data = await res.json().catch(() => ({}));
    if (!res.ok) {
        throw new Error(data.message || 'Ghi nhận đơn hàng thất bại.');
    }
    return data;
}

function showPaymentResult(success, message) {
    const body = document.getElementById('paymentResultBody');
    const modalElement = document.getElementById('paymentResultModal');
    if (!body || !modalElement) {
        alert(message);
        return;
    }
    stopCountTimer();
    body.style.backgroundColor = '';
    body.classList.remove('bg-checking');
    body.textContent = message;
    body.classList.toggle('bg-success', success);
    body.classList.toggle('bg-danger', !success);
    body.classList.remove('bg-primary');
    const modal = new bootstrap.Modal(modalElement);
    modal.show();
}

function showChecking(message) {
    const body = document.getElementById('paymentResultBody');
    const modalElement = document.getElementById('paymentResultModal');
    if (!body || !modalElement) return;
    stopCountTimer();
    body.textContent = message;
    body.classList.remove('bg-success', 'bg-danger');
    body.style.backgroundColor = '#0c3b2e';
    body.classList.add('bg-checking');
    startCountUp(body);
    const modal = new bootstrap.Modal(modalElement);
    modal.show();
}

function normalizeAmount(val) {
    if (typeof val === 'number') return Math.round(val);
    if (!val) return 0;
    const digits = String(val).replace(/[^\d]/g, '');
    const numeric = parseInt(digits, 10);
    return Number.isNaN(numeric) ? 0 : numeric;
}

function normalizeText(val) {
    return (val || '').toString().trim().toLowerCase();
}

function extractRows(data) {
    if (!data) return [];
    if (Array.isArray(data)) return data;
    if (Array.isArray(data.rows)) return data.rows;
    if (Array.isArray(data.values)) return data.values;
    if (Array.isArray(data.data)) return data.data;
    return [];
}

function isPaymentMatched(data, targetAmount, targetDesc) {
    const rows = extractRows(data);
    if (!rows.length) return false;
    const normTargetDesc = normalizeText(targetDesc);
    const normTargetAmount = normalizeAmount(targetAmount);

    return rows.some((row) => {
        let desc, amount;
        if (Array.isArray(row)) {
            desc = row[1];
            amount = row[2];
        } else if (row && typeof row === 'object') {
            desc = row.description ?? row['Mô tả'] ?? row.mota ?? row.mo_ta ?? row.desc;
            amount = row.amount ?? row['Giá trị'] ?? row.giatri ?? row.value;
        }
        const normDesc = normalizeText(desc);
        const normAmount = normalizeAmount(amount);
        const amountMatch = normAmount === normTargetAmount;
        const descMatch = normDesc.includes(normTargetDesc) || normTargetDesc.includes(normDesc);
        return amountMatch && descMatch;
    });
}

function setButtonLoading(btn, isLoading) {
    if (!btn) return;
    btn.disabled = !!isLoading;
    btn.dataset.originalText = btn.dataset.originalText || btn.textContent;
    btn.textContent = isLoading ? 'Đang kiểm tra...' : btn.dataset.originalText;
}

let countTimer = null;
let autoCheckRan = false;
function startCountUp(targetEl) {
    if (!targetEl) return;
    stopCountTimer();
    let elapsed = 0;
    const updateText = () => {
        targetEl.textContent = `Đang kiểm tra thanh toán... (${elapsed}s)`;
        elapsed += 1;
    };
    updateText();
    countTimer = setInterval(updateText, 1000);
}

function stopCountTimer() {
    if (countTimer) {
        clearInterval(countTimer);
        countTimer = null;
    }
}

function clearCartUI() {
    const cartRow = document.getElementById('cartRow');
    const cartBody = document.getElementById('cartBody');
    const emptyRow = document.getElementById('emptyRow');
    const cartTotal = document.getElementById('cartTotal');
    const summaryTotal = document.getElementById('summaryTotal');
    const summaryCount = document.getElementById('summaryCount');
    if (cartRow && cartBody) {
        cartBody.removeChild(cartRow);
    }
    if (emptyRow) {
        emptyRow.style.display = '';
    } else if (cartBody && !cartBody.querySelector('#emptyRow')) {
        const tr = document.createElement('tr');
        tr.id = 'emptyRow';
        tr.innerHTML = '<td colspan="4" class="py-4 text-muted">Chưa có khóa học nào trong giỏ.</td>';
        cartBody.appendChild(tr);
    }
    if (cartTotal) cartTotal.textContent = 'Tổng: 0 VNĐ';
    if (summaryTotal) summaryTotal.textContent = '0 VNĐ';
    if (summaryCount) summaryCount.textContent = 'Chưa có khóa học';
}

document.addEventListener('DOMContentLoaded', () => {
    // Tự động kiểm tra sau 30s nếu có khóa học (chỉ hiện popup khi thành công)
    if (!autoCheckRan && <?php echo e($course ? 'true' : 'false'); ?>) {
        autoCheckRan = true;
        setTimeout(() => {
            checkPaid(<?php echo e($rawPrice); ?>, '<?php echo e($transferNoteSafe); ?>', null, true);
        }, 30000);
    }
});
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('student.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/student/cart.blade.php ENDPATH**/ ?>