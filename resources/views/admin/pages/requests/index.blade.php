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
                    <div class="card-title">
                        Requests List
                    </div>
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
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($requests as $request)
                                    <tr>
                                        <td>{{ $request->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="ms-2">
                                                    <p class="fw-semibold mb-0 d-flex align-items-center">
                                                        {{ $request->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary-transparent">
                                                {{ __('frontend.services_list.items.' . $request->service_type) }}
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
                                                data-service="{{ __('frontend.services_list.items.' . $request->service_type) }}"
                                                data-message="{{ $request->message ?: 'No message provided.' }}"
                                                data-status="{{ $request->status }}"
                                                data-date="{{ $request->created_at->format('Y-m-d H:i') }}">
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="requestModalLabel">Request Details</h6>
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
                            <label class="form-label text-muted d-block text-uppercase fx-11">Contacts</label>
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
                            <label class="form-label text-muted d-block text-uppercase fx-11">Service Type</label>
                            <span class="badge bg-primary-transparent fs-13" id="modalService">Service Name</span>
                        </div>
                        <div class="col-12">
                            <label class="form-label text-muted d-block text-uppercase fx-11">Message Details</label>
                            <div class="p-3 bg-light rounded text-break" id="modalMessage">
                                Message content goes here...
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
        // Use Vanilla JS to populate modal
        const requestModal = document.getElementById('requestModal');
        if (requestModal) {
            requestModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget;

                // Extract info from data-attributes
                const name = button.getAttribute('data-name');
                const email = button.getAttribute('data-email');
                const phone = button.getAttribute('data-phone');
                const service = button.getAttribute('data-service');
                const message = button.getAttribute('data-message');
                const date = button.getAttribute('data-date');

                // Update the modal's content.
                requestModal.querySelector('#modalName').textContent = name;
                requestModal.querySelector('#modalDate').textContent = date;
                requestModal.querySelector('#modalService').textContent = service;
                requestModal.querySelector('#modalMessage').textContent = message;

                // Update Links
                const emailLink = requestModal.querySelector('#modalEmail');
                emailLink.textContent = email;
                emailLink.href = 'mailto:' + email;

                const phoneLink = requestModal.querySelector('#modalPhone');
                phoneLink.textContent = phone;
                // Format for WhatsApp (remove spaces, -, +)
                const cleanPhone = phone.replace(/[^0-9]/g, '');
                phoneLink.href = 'https://wa.me/' + cleanPhone;
            });
        }
    </script>
@endsection
