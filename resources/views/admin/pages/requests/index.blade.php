@extends('admin.layouts.master')

@section('title', 'Service Requests')

@section('content')
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Service Requests</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Service Requests</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Requests List</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Contacts</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($requests as $request)
                                    @php
                                        $capitals = [
                                            '50000_to_500000' => 'من 50,000 إلى 500,000',
                                            '500000_to_10000000' => 'من 500,000 إلى 10,000,000',
                                            'more_than_10000000' => 'أكثر من 10,000,000',
                                        ];
                                    @endphp
                                    <tr>
                                        <td>{{ $request->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="ms-2">
                                                    <p class="fw-semibold mb-0">{{ $request->name }}</p>
                                                    @if ($request->company_name)
                                                        <small class="text-muted"><i
                                                                class="ri-building-2-line me-1"></i>{{ $request->company_name }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary-transparent">
                                                {{ $request->service_type }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <a href="tel:{{ $request->phone }}" class="text-muted fs-12"><i
                                                        class="ri-phone-line me-1"></i>{{ $request->phone }}</a>
                                                <a href="mailto:{{ $request->email }}" class="text-muted fs-12"><i
                                                        class="ri-mail-line me-1"></i>{{ $request->email }}</a>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm btn-info-light"
                                                data-bs-toggle="modal" data-bs-target="#requestModal"
                                                data-name="{{ $request->name }}" data-email="{{ $request->email }}"
                                                data-phone="{{ $request->phone }}"
                                                data-service="{{ $request->service_type }}"
                                                data-message="{{ $request->message ?: '' }}"
                                                data-status="{{ $request->status }}"
                                                data-date="{{ $request->created_at->format('Y-m-d H:i') }}"
                                                data-attachments="{{ $request->attachments? json_encode(array_map(function ($path) {return \Illuminate\Support\Facades\Storage::url($path);}, $request->attachments)): '[]' }}"
                                                data-political="{{ $request->has_political_activity !== null ? ($request->has_political_activity ? 'نعم' : 'لا') : '' }}"
                                                data-company-name="{{ $request->company_name ?: '' }}"
                                                data-company-website="{{ $request->company_website ?: '' }}"
                                                data-company-capital="{{ $capitals[$request->company_capital] ?? '' }}"
                                                data-political="{{ $request->has_political_activity !== null ? ($request->has_political_activity ? 'نعم' : 'لا') : '' }}"
                                                data-premium="{{ $request->premium_residency !== null ? ($request->premium_residency ? 'نعم' : 'لا') : '' }}"
                                                data-commercial-record="{{ $request->commercial_record ? Storage::url($request->commercial_record) : '' }}"
                                                data-incorporation="{{ $request->incorporation_contract ? Storage::url($request->incorporation_contract) : '' }}">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <span class="badge bg-success-transparent">{{ $request->status }}</span>
                                        </td>
                                        <td>{{ $request->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm btn-danger-light"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                data-url="{{ route('admin.requests.destroy', $request->id) }}">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">No requests found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $requests->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Request Details Modal -->
    <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="requestModalLabel">Request Details</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Client header -->
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar avatar-xl bg-primary-transparent rounded-circle me-3">
                            <i class="ri-user-line fs-24 text-primary"></i>
                        </div>
                        <div>
                            <h5 class="mb-1" id="modalName">User Name</h5>
                            <p class="text-muted mb-0" id="modalDate">Date</p>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-success-transparent fs-13" id="modalStatus">Status</span>
                        </div>
                    </div>

                    <!-- Basic Info -->
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label text-muted d-block text-uppercase fs-11">Contacts</label>
                            <div class="mb-1">
                                <i class="ri-mail-line me-1 text-primary"></i>
                                <a href="#" id="modalEmail" class="text-dark text-decoration-underline">—</a>
                            </div>
                            <div>
                                <i class="ri-whatsapp-line me-1 text-success"></i>
                                <a href="#" id="modalPhone" class="text-dark text-decoration-underline"
                                    target="_blank">—</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted d-block text-uppercase fs-11">Service Type</label>
                            <span class="badge bg-primary-transparent fs-13" id="modalService">—</span>
                        </div>
                        <div class="col-md-4" id="modalMessageWrap">
                            <label class="form-label text-muted d-block text-uppercase fs-11">Message</label>
                            <div class="p-2 bg-light rounded text-break small" id="modalMessage"
                                style="max-height:80px;overflow-y:auto;direction:rtl">—</div>
                        </div>
                        <div class="col-md-6" id="wrapPoliticalGeneral">
                            <label class="form-label text-muted d-block text-uppercase fs-11">نشاط سياسي؟</label>
                            <span class="badge bg-light text-dark border fs-13" id="modalPoliticalGeneral">—</span>
                        </div>
                        <div class="col-md-6" id="wrapAttachment">
                            <label class="form-label text-muted d-block text-uppercase fs-11">مرفقات (إن وجدت)</label>
                            <div id="attachmentsContainer" class="d-flex flex-wrap gap-2">
                                <!-- Links will be generated here -->
                            </div>
                            <span id="modalNoAttachment" class="text-muted small">—</span>
                        </div>
                    </div>

                    <!-- Business Fields Section (shown only if business data exists) -->
                    <div id="businessSection" class="mt-4 d-none">
                        <hr class="my-3">
                        <h6 class="fw-bold text-danger mb-3"><i class="ri-building-2-line me-2"></i>معلومات الشركة
                            والأعمال</h6>
                        <div class="row g-3">
                            <div class="col-md-4" id="wrapCompanyName">
                                <label class="form-label text-muted text-uppercase fs-11">اسم الشركة</label>
                                <p class="fw-semibold mb-0" id="modalCompanyName">—</p>
                            </div>
                            <div class="col-md-4" id="wrapCompanyCapital">
                                <label class="form-label text-muted text-uppercase fs-11">رأس المال</label>
                                <p class="fw-semibold mb-0" id="modalCompanyCapital">—</p>
                            </div>
                            <div class="col-md-4" id="wrapCompanyWebsite">
                                <label class="form-label text-muted text-uppercase fs-11">الموقع الإلكتروني</label>
                                <a href="#" id="modalCompanyWebsite"
                                    class="text-primary text-decoration-underline d-block" target="_blank">—</a>
                            </div>
                            <div class="col-md-6" id="wrapPremium">
                                <label class="form-label text-muted text-uppercase fs-11">إقامة مميزة للمالك؟</label>
                                <p class="fw-semibold mb-0" id="modalPremium">—</p>
                            </div>
                            <div class="col-md-6" id="wrapCommercialRecord">
                                <label class="form-label text-muted text-uppercase fs-11">السجل التجاري</label>
                                <div id="modalCommercialRecordContainer" class="w-100">
                                </div>
                            </div>
                            <div class="col-md-6" id="wrapIncorporation">
                                <label class="form-label text-muted text-uppercase fs-11">عقد التأسيس</label>
                                <div id="modalIncorporationContainer" class="w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @include('admin.components.delete_modal')

    <script>
        const requestModal = document.getElementById('requestModal');
        if (requestModal) {
            requestModal.addEventListener('show.bs.modal', event => {
                const btn = event.relatedTarget;

                // Basic fields
                const name = btn.dataset.name || '—';
                const email = btn.dataset.email || '—';
                const phone = btn.dataset.phone || '—';
                const service = btn.dataset.service || '—';
                const message = btn.dataset.message || '';
                const date = btn.dataset.date || '—';
                const status = btn.dataset.status || '—';
                const attachmentsData = btn.dataset.attachments || '[]';
                let attachments = [];
                try {
                    attachments = JSON.parse(attachmentsData);
                } catch (e) {
                    console.error("Failed to parse attachments data.");
                }
                const political = btn.dataset.political || '';

                requestModal.querySelector('#modalName').textContent = name;
                requestModal.querySelector('#modalDate').textContent = date;
                requestModal.querySelector('#modalStatus').textContent = status;
                requestModal.querySelector('#modalService').textContent = service;
                requestModal.querySelector('#modalMessage').textContent = message || 'لا توجد رسالة.';

                // General Political Activity
                requestModal.querySelector('#modalPoliticalGeneral').textContent = political || 'غير محدد';

                // Helper function to build professional file cards
                function createFileCard(url, defaultTitle) {
                    const isImage = /\.(jpg|jpeg|png|gif|webp)$/i.test(url);
                    const fileCard = document.createElement('div');
                    fileCard.className = 'border rounded p-2 d-flex align-items-center gap-2 bg-white mt-1';
                    fileCard.style.maxWidth = '100%';

                    let imgHtml = '';
                    if (isImage) {
                        imgHtml =
                            `<img src="${url}" alt="Thumbnail" class="rounded object-fit-cover shadow-sm border" style="width: 45px; height: 45px;">`;
                    } else {
                        imgHtml = `<div class="rounded bg-light d-flex align-items-center justify-content-center text-primary shadow-sm border border-light" style="width: 45px; height: 45px;">
                            <i class="ri-file-text-line fs-20"></i>
                        </div>`;
                    }

                    const fileNameObj = url.split('/').pop() || defaultTitle;
                    let fileName = fileNameObj;
                    if (fileName.includes('?')) fileName = fileName.split('?')[0]; // clean query params
                    const displayFileName = fileName.length > 20 ? fileName.substring(0, 20) + '...' : fileName;

                    fileCard.innerHTML = `
                        ${imgHtml}
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1 fs-12 fw-semibold text-truncate text-dark" title="${fileName}">${displayFileName}</p>
                            <div class="d-flex gap-2">
                                <a href="${url}" class="btn btn-xs btn-primary-light px-2 py-0 fs-11 d-flex align-items-center gap-1" target="_blank" title="عرض الملف">
                                    <i class="ri-eye-line"></i> عرض
                                </a>
                                <a href="${url}" class="btn btn-xs btn-success-light px-2 py-0 fs-11 d-flex align-items-center gap-1" download title="تنزيل الملف">
                                    <i class="ri-download-2-line"></i> تنزيل
                                </a>
                            </div>
                        </div>
                    `;
                    return fileCard;
                }

                // General Attachments
                const attachmentsContainer = requestModal.querySelector('#attachmentsContainer');
                const noAttachmentText = requestModal.querySelector('#modalNoAttachment');

                attachmentsContainer.innerHTML = ''; // clear previous

                if (attachments && attachments.length > 0) {
                    attachments.forEach((url, i) => {
                        attachmentsContainer.appendChild(createFileCard(url, `مرفق ${i + 1}`));
                    });
                    noAttachmentText.classList.add('d-none');
                } else {
                    noAttachmentText.classList.remove('d-none');
                }

                const emailLink = requestModal.querySelector('#modalEmail');
                emailLink.textContent = email;
                emailLink.href = 'mailto:' + email;

                const phoneLink = requestModal.querySelector('#modalPhone');
                phoneLink.textContent = phone;
                phoneLink.href = 'https://wa.me/' + phone.replace(/[^0-9]/g, '');

                // Business fields
                const companyName = btn.dataset.companyName || '';
                const companyWebsite = btn.dataset.companyWebsite || '';
                const companyCapital = btn.dataset.companyCapital || '';
                const premium = btn.dataset.premium || '';
                const commercialRecord = btn.dataset.commercialRecord || '';
                const incorporation = btn.dataset.incorporation || '';

                const hasBusinessData = companyName || companyWebsite || companyCapital || premium ||
                    commercialRecord || incorporation;
                const section = requestModal.querySelector('#businessSection');

                if (hasBusinessData) {
                    section.classList.remove('d-none');

                    // Company name
                    const wCN = requestModal.querySelector('#wrapCompanyName');
                    requestModal.querySelector('#modalCompanyName').textContent = companyName || '—';
                    wCN.classList.toggle('d-none', !companyName);

                    // Capital
                    const wCC = requestModal.querySelector('#wrapCompanyCapital');
                    requestModal.querySelector('#modalCompanyCapital').textContent = companyCapital || '—';
                    wCC.classList.toggle('d-none', !companyCapital);

                    // Website
                    const wCW = requestModal.querySelector('#wrapCompanyWebsite');
                    const websiteEl = requestModal.querySelector('#modalCompanyWebsite');
                    if (companyWebsite) {
                        websiteEl.textContent = companyWebsite;
                        websiteEl.href = companyWebsite;
                        wCW.classList.remove('d-none');
                    } else {
                        wCW.classList.add('d-none');
                    }

                    // Premium residency
                    const wPre = requestModal.querySelector('#wrapPremium');
                    requestModal.querySelector('#modalPremium').textContent = premium || '—';
                    wPre.classList.toggle('d-none', !premium);

                    // Commercial record
                    const wCR = requestModal.querySelector('#wrapCommercialRecord');
                    const crContainer = requestModal.querySelector('#modalCommercialRecordContainer');
                    crContainer.innerHTML = '';
                    if (commercialRecord) {
                        crContainer.appendChild(createFileCard(commercialRecord, 'السجل التجاري'));
                        wCR.classList.remove('d-none');
                    } else {
                        wCR.classList.add('d-none');
                    }

                    // Incorporation contract
                    const wIC = requestModal.querySelector('#wrapIncorporation');
                    const icContainer = requestModal.querySelector('#modalIncorporationContainer');
                    icContainer.innerHTML = '';
                    if (incorporation) {
                        icContainer.appendChild(createFileCard(incorporation, 'عقد التأسيس'));
                        wIC.classList.remove('d-none');
                    } else {
                        wIC.classList.add('d-none');
                    }

                } else {
                    section.classList.add('d-none');
                }
            });
        }
    </script>
@endsection
