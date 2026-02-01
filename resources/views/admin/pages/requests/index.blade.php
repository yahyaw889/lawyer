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
                                            <button type="button" class="btn btn-icon btn-sm btn-light"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="{{ $request->message ?: 'No message' }}">
                                                <i class="ri-message-2-line"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning-transparent">{{ $request->status }}</span>
                                        </td>
                                        <td>{{ $request->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <form action="{{ route('admin.requests.destroy', $request->id) }}"
                                                method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon btn-sm btn-danger-light"><i
                                                        class="ri-delete-bin-line"></i></button>
                                            </form>
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
@endsection
