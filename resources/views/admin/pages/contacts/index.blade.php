@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h3 class="mb-0 text-dark">رسائل التواصل</h3>
                <p class="mb-0 text-muted">إدارة رسائل نموذج التواصل في الموقع.</p>
            </div>
            <div class="main-dashboard-header-right"></div>
        </div>

        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">قائمة الرسائل</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover border table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>الهاتف</th>
                                    <th>الموضوع</th>
                                    <th>الرسالة</th>
                                    <th>الحالة</th>
                                    <th>التاريخ</th>
                                    <th>إجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone ?? '-' }}</td>
                                        <td>{{ $contact->subject ?? '-' }}</td>
                                        <td>{{ Str::limit($contact->message, 50, '...') }}</td>
                                        <td>
                                            @if ($contact->status == 'new')
                                                <span class="badge bg-primary-transparent">جديد</span>
                                            @elseif($contact->status == 'read')
                                                <span class="badge bg-secondary-transparent">مقروء</span>
                                            @elseif($contact->status == 'replied')
                                                <span class="badge bg-success-transparent">تم الرد</span>
                                            @else
                                                <span class="badge bg-light-transparent">{{ $contact->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <div class="btn-list">
                                                <button type="button" class="btn btn-sm btn-icon btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#showContactModal"
                                                    data-contact='@json($contact)' title="عرض التفاصيل">
                                                    <i class="bx bx-show"></i>
                                                </button>
                                                <a href="mailto:{{ $contact->email }}" class="btn btn-sm btn-icon btn-info"
                                                    data-bs-toggle="tooltip" title="إرسال بريد">
                                                    <i class="bx bx-envelope"></i>
                                                </a>
                                                @if ($contact->phone)
                                                    <a href="https://wa.me/{{ $contact->phone }}" target="_blank"
                                                        class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip"
                                                        title="واتساب">
                                                        <i class="bx bxl-whatsapp"></i>
                                                    </a>
                                                    <a href="tel:{{ $contact->phone }}"
                                                        class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip"
                                                        title="اتصال">
                                                        <i class="bx bx-phone"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-muted">لا توجد رسائل تواصل حالياً.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Show Contact Modal -->
<div class="modal fade" id="showContactModal" tabindex="-1" aria-labelledby="showContactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showContactModalLabel">تفاصيل الرسالة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">الاسم:</label>
                        <p id="modal_name" class="text-muted"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">البريد الإلكتروني:</label>
                        <p id="modal_email" class="text-muted"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">الهاتف:</label>
                        <p id="modal_phone" class="text-muted"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">التاريخ:</label>
                        <p id="modal_date" class="text-muted"></p>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="fw-bold">الموضوع:</label>
                        <p id="modal_subject" class="text-muted"></p>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="fw-bold">الرسالة:</label>
                        <div class="p-3 bg-light rounded" id="modal_message" style="white-space: pre-wrap;"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" id="btn_whatsapp" target="_blank" class="btn btn-success">
                    <i class="bx bxl-whatsapp me-1"></i> واتساب
                </a>
                <a href="#" id="btn_email" class="btn btn-info">
                    <i class="bx bx-envelope me-1"></i> بريد إلكتروني
                </a>
                <a href="#" id="btn_call" class="btn btn-warning">
                    <i class="bx bx-phone me-1"></i> اتصال
                </a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var showContactModal = document.getElementById('showContactModal');
        showContactModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var contact = JSON.parse(button.getAttribute('data-contact'));

            // Populate data
            document.getElementById('modal_name').textContent = contact.name;
            document.getElementById('modal_email').textContent = contact.email;
            document.getElementById('modal_phone').textContent = contact.phone || '-';
            document.getElementById('modal_subject').textContent = contact.subject || '-';
            document.getElementById('modal_message').textContent = contact.message;
            document.getElementById('modal_date').textContent = contact.created_at;

            // Update Actions
            document.getElementById('btn_email').href = 'mailto:' + contact.email;

            if (contact.phone) {
                document.getElementById('btn_whatsapp').href = 'https://wa.me/' + contact.phone;
                document.getElementById('btn_whatsapp').style.display = 'inline-flex';

                document.getElementById('btn_call').href = 'tel:' + contact.phone;
                document.getElementById('btn_call').style.display = 'inline-flex';
            } else {
                document.getElementById('btn_whatsapp').style.display = 'none';
                document.getElementById('btn_call').style.display = 'none';
            }
        });
    });
</script>
