@extends('student.layouts.app')

@section('style')
    <link rel="stylesheet" href="/om-front/css/custom-option.css">
@endsection

@section('content')
    @php
        $rawPrice = (float) $document->price;
        $displayPrice = $rawPrice > 0 ? number_format($rawPrice, 0, ',', '.') . ' VNĐ' : 'Miễn phí';
        $transferNote = 'td' . ($student?->id ?? '0') . $document->id;
    @endphp

    <div class="container mt-6">
        <div class="row gx-lg-4 gx-xl-5 justify-content-between thong-tin-khoa-hoc">
            <div class="col-lg-8 mb-5">
                <p class="fs-1 mb-1 fw-bold text-sm-center text-md-left"># Thông tin thanh toán tài liệu</p>
                <div class="table-responsive-md">
                    <table class="table mt-5 align-middle fs-2 fw-bold text-center cart-table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tài liệu</th>
                                <th scope="col" class="text-nowrap">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1.</th>
                                <td class="text-start">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <p class="fs-3 mb-1">{{ $document->title }}</p>
                                            <p class="fs-4 mb-0 text-muted">
                                                {{ $document->published_at ? $document->published_at->format('d/m/Y') : '' }}
                                            </p>
                                            <p class="fs-4 mb-0">
                                                @foreach ($document->topics as $topic)
                                                    <span class="me-2">#{{ $topic->name }}</span>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-nowrap price-cell">{{ $displayPrice }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="fw-bold fs-2 mt-3 text-sm-center text-md-end" id="cartTotal">Tổng: {{ $displayPrice }}</p>
<hr>
                <div class="row gx-lg-4 gx-xl-5 justify-content-between">
                    <div class="col-12">
                        <div class="page-card mt-4">
                            <h3 class="fs-2 fw-bold mb-3">Thông tin giao hàng</h3>
                            <form id="documentPurchaseForm" class="row g-3">
                                @csrf
                                <div class="col-md-6">
                                    <label class="form-label fs-4 fw-bold">Họ tên</label>
                                    <input type="text" name="name" class="form-control fs-3"
                                        value="{{ old('name', $student->name ?? '') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fs-4 fw-bold">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control fs-3"
                                        value="{{ old('phone', $student->phone ?? '') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fs-4 fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control fs-3"
                                        value="{{ old('email', $student->email ?? '') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fs-4 fw-bold">Địa chỉ nhận hàng</label>
                                    <input type="text" name="address" class="form-control fs-3"
                                        value="{{ old('address') }}" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fs-4 fw-bold">Ghi chú</label>
                                    <textarea name="notes" class="form-control fs-3" rows="3" placeholder="Ghi chú thêm cho nhân viên">{{ old('notes') }}</textarea>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-success fs-3 rounded-4 px-5"
                                        onclick="handleDocumentPurchase(this)">Lưu thông tin & xác nhận</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 d-flex flex-column mb-6">
                <p class="fs-1 mb-3 fw-bold text-center"># Thanh toán</p>
                <div
                    class="custom-bg-5 p-sm-3 p-md-4 p-lg-4 py-lg-5 d-flex justify-content-center flex-column rounded-5 shadow">
                    <p class="text-center fs-3 fw-bold">Tổng cộng</p>
                    <p class="text-center fs-3 fw-bold mb-0">{{ $displayPrice }}</p>
                    <p class="text-center fs-4 fst-italic" id="summaryCount">(1 tài liệu)</p>

                    <p class="text-center fs-3">Thanh toán theo mã QR</p>
                    <div class="d-flex justify-content-center mb-3">
                        <img class="w-75 mx-auto"
                            src="https://img.vietqr.io/image/mb-163448866-compact2.jpg?amount={{ $rawPrice }}&addInfo={{ $transferNote }}"
                            alt="QR Thanh toán">
                    </div>
                    <hr class="opacity-100 w-25 ms-auto me-auto mt-4">
                    <p class="text-center fs-3 mb-0">Thanh toán chuyển khoản</p>
                    <p class="text-center fs-5 mb-0 fw-bold">MB Bank - 163448866 - Phạm Ngọc Hùng</p>
                    <p class="text-center fs-4 mb-0">Nội dung: {{ $transferNote }}</p>
                    <p class="text-center fs-4 mb-0">Chúng tôi sẽ liên hệ lại ngay sau khi xác nhận.</p>
                    <hr class="opacity-100 w-25 mx-auto mt-4">
                    <p class="text-center fs-5 mb-0 fst-italic">Vui lòng giữ lại biên lai thanh toán.</p>
                </div>
            </div>
        </div>


    </div>

    <div class="modal fade" id="documentPaymentResultModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 40%; width: 90%;">
            <div class="modal-content border-0">
                <div id="documentPaymentResultBody" class="modal-body text-center text-white fw-bold fs-3 rounded-top">
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const DOCUMENT_CHECK_URL =
            'https://script.google.com/macros/s/AKfycbw7di2IkMECJx2aYSN6lBtAyIX5bU44PeCWc56UBuDdNoiIbRvlgauTZWLm4AX2VpBYmA/exec';
        const documentConfirmUrl = @json(route('student.documents.cart.confirm', ['document' => $document->id]));
        const rawDocumentPrice = {{ $rawPrice }};
        const transferNoteDocument = '{{ $transferNote }}';
        const csrfToken = '{{ csrf_token() }}';
        const materialsRoute = @json(route('student.materials'));
        const paymentResultBody = document.getElementById('documentPaymentResultBody');
        const paymentModalElement = document.getElementById('documentPaymentResultModal');
        const paymentModal = paymentModalElement ? new bootstrap.Modal(paymentModalElement) : null;
        let lastPaymentSuccess = false;

        async function handleDocumentPurchase(btn) {
            const form = document.getElementById('documentPurchaseForm');
            const formData = new FormData(form);
            const payload = {
                name: formData.get('name'),
                phone: formData.get('phone'),
                email: formData.get('email'),
                address: formData.get('address'),
                notes: formData.get('notes'),
            };

        if (!payload.name || !payload.phone || !payload.email || !payload.address) {
            showPaymentResult(false, 'Vui lòng điền đầy đủ thông tin.');
            return;
        }

            showChecking('Đang kiểm tra thanh toán...');
            setButtonLoading(btn, true);

            try {
                const params = new URLSearchParams({
                    amount: rawDocumentPrice,
                    description: transferNoteDocument
                });
                const res = await fetch(`${DOCUMENT_CHECK_URL}?${params.toString()}`);
                if (!res.ok) throw new Error('Kiểm tra thanh toán thất bại.');
                const data = await res.json();
                if (isPaymentMatched(data, rawDocumentPrice, transferNoteDocument)) {
                    await submitDocumentForm(payload);
                    showPaymentResult(true, 'Thanh toán thành công! Chúng tôi sẽ liên hệ bạn ngay.');
                } else {
                    showPaymentResult(false, 'Thanh toán chưa được xác nhận. Vui lòng thử lại.');
                }
            } catch (error) {
                showPaymentResult(false, 'Thanh toán thất bại: ' + error.message);
            } finally {
                setButtonLoading(btn, false);
            }
        }

        async function submitDocumentForm(payload) {
            const response = await fetch(documentConfirmUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    amount: rawDocumentPrice,
                    payment_note: transferNoteDocument,
                    ...payload,
                }),
            });

            if (!response.ok) {
                const data = await response.json().catch(() => ({}));
                throw new Error(data.message || 'Lưu thông tin thất bại.');
            }
        }

        if (paymentModalElement && paymentResultBody) {
            paymentModalElement.addEventListener('hidden.bs.modal', () => {
                paymentResultBody.textContent = '';
                paymentResultBody.style.backgroundColor = '';
                if (lastPaymentSuccess) {
                    lastPaymentSuccess = false;
                    window.location.assign(materialsRoute);
                }
            });
        }

        function showPaymentResult(success, message) {
            if (!paymentResultBody || !paymentModal) {
                alert(message);
                return;
            }
            paymentResultBody.textContent = message;
            paymentResultBody.classList.toggle('bg-success', success);
            paymentResultBody.classList.toggle('bg-danger', !success);
            paymentResultBody.style.backgroundColor = '';
            lastPaymentSuccess = success;
            paymentModal.show();
        }

        function showChecking(message) {
            if (!paymentResultBody || !paymentModal) return;
            paymentResultBody.textContent = message;
            paymentResultBody.classList.remove('bg-success', 'bg-danger');
            paymentResultBody.style.backgroundColor = '#0c3b2e';
            lastPaymentSuccess = false;
            paymentModal.show();
        }

        function setButtonLoading(btn, isLoading) {
            if (!btn) return;
            btn.disabled = !!isLoading;
            btn.dataset.originalText = btn.dataset.originalText || btn.textContent;
            btn.textContent = isLoading ? 'Đang kiểm tra...' : btn.dataset.originalText;
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
    </script>
@endpush
