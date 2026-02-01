@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">طلبات الاستشارة</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">طلبات الاستشارة</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Content -->
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">قائمة الطلبات</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">الاسم</th>
                                <th scope="col">نوع الاستشارة</th>
                                <th scope="col">الموضوع</th>
                                <th scope="col">حالة الدفع</th>
                                <th scope="col">المبلغ</th>
                                <th scope="col">تاريخ الطلب</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($consultations as $consultation)
                                <tr>
                                    <td>{{ $consultation->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 fw-semibold">{{ $consultation->name }}</p>
                                                <p class="mb-0 text-muted fs-12">{{ $consultation->email }} |
                                                    {{ $consultation->phone }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary-transparent">
                                            {{ $consultation->type }}
                                        </span>
                                    </td>
                                    <td>{{ Str::limit($consultation->topic, 30) }}</td>
                                    <td>
                                        @if ($consultation->payment_status == 'PAID')
                                            <span class="badge bg-success-transparent">مدفوع</span>
                                        @elseif($consultation->payment_status == 'PENDING')
                                            <span class="badge bg-warning-transparent">انتظار</span>
                                        @else
                                            <span class="badge bg-danger-transparent">فشل</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($consultation->paymentTransaction)
                                            {{ $consultation->paymentTransaction->amount }}
                                            {{ $consultation->paymentTransaction->currency }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $consultation->created_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-icon btn-sm btn-info-light"
                                            data-bs-toggle="modal" data-bs-target="#consultationModal"
                                            data-name="{{ $consultation->name }}" data-email="{{ $consultation->email }}"
                                            data-phone="{{ $consultation->phone }}" data-type="{{ $consultation->type }}"
                                            data-topic="{{ $consultation->topic }}"
                                            data-payment-status="{{ $consultation->payment_status }}"
                                            data-amount="{{ $consultation->paymentTransaction ? $consultation->paymentTransaction->amount . ' ' . $consultation->paymentTransaction->currency : '-' }}"
                                            data-date="{{ $consultation->created_at->format('Y-m-d H:i') }}">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">لا توجد طلبات استشارة حتى الان</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="mt-3">
                    {{ $consultations->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

    </div>

    <!-- Consultation Details Modal -->
    <div class="modal fade" id="consultationModal" tabindex="-1" aria-labelledby="consultationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="consultationModalLabel">تفاصيل الاستشارة</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar avatar-xl bg-primary-transparent rounded-circle me-3">
                            <i class="ri-user-line fs-24 text-primary"></i>
                        </div>
                        <div>
                            <h5 class="mb-1" id="modalName">User Name</h5>
                            <p class="text-muted mb-0" id="modalDate">Date</p>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-label text-muted d-block text-uppercase fx-11">معلومات الاتصال</label>
                            <div class="mb-2">
                                <i class="ri-mail-line me-1 text-primary"></i>
                                <a href="#" id="modalEmail"
                                    class="text-dark text-decoration-underline">email@example.com</a>
                            </div>
                            <div>
                                <i class="ri-whatsapp-line me-1 text-success"></i>
                                <a href="#" id="modalPhone" class="text-dark text-decoration-underline"
                                    target="_blank">+966 50 000 0000</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label text-muted d-block text-uppercase fx-11">نوع الاستشارة</label>
                            <span class="badge bg-primary-transparent fs-13" id="modalType">Type</span>

                            <div class="mt-3">
                                <label class="form-label text-muted d-block text-uppercase fx-11">حالة الدفع</label>
                                <span class="badge bg-success-transparent fs-12" id="modalPaymentStatus">PAID</span>
                                <span class="fs-12 text-muted ms-1" id="modalAmount"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label text-muted d-block text-uppercase fx-11">موضوع الاستشارة</label>
                            <div class="p-3 bg-light rounded text-break" id="modalTopic">
                                Topic content goes here...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const consultationModal = document.getElementById('consultationModal');
            if (consultationModal) {
                consultationModal.addEventListener('show.bs.modal', event => {
                    const button = event.relatedTarget;

                    // Extract info
                    const name = button.getAttribute('data-name');
                    const email = button.getAttribute('data-email');
                    const phone = button.getAttribute('data-phone');
                    const type = button.getAttribute('data-type');
                    const topic = button.getAttribute('data-topic');
                    const paymentStatus = button.getAttribute('data-payment-status');
                    const amount = button.getAttribute('data-amount');
                    const date = button.getAttribute('data-date');

                    // Update Modal
                    consultationModal.querySelector('#modalName').textContent = name;
                    consultationModal.querySelector('#modalDate').textContent = date;
                    consultationModal.querySelector('#modalType').textContent = type;
                    consultationModal.querySelector('#modalTopic').textContent = topic;
                    consultationModal.querySelector('#modalPaymentStatus').textContent = paymentStatus;
                    consultationModal.querySelector('#modalAmount').textContent = amount !== '-' ?
                        `(${amount})` : '';

                    // Style Payment Badge
                    const badge = consultationModal.querySelector('#modalPaymentStatus');
                    badge.className = 'badge fs-12';
                    if (paymentStatus === 'PAID') badge.classList.add('bg-success-transparent');
                    else if (paymentStatus === 'PENDING') badge.classList.add('bg-warning-transparent');
                    else badge.classList.add('bg-danger-transparent');

                    // Update Links
                    const emailLink = consultationModal.querySelector('#modalEmail');
                    emailLink.textContent = email;
                    emailLink.href = 'mailto:' + email;

                    const phoneLink = consultationModal.querySelector('#modalPhone');
                    phoneLink.textContent = phone;
                    const cleanPhone = phone.replace(/[^0-9]/g, '');
                    phoneLink.href = 'https://wa.me/' + cleanPhone;
                });
            }
        });
    </script>
@endsection
