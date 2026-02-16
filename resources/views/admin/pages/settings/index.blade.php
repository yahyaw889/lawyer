@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h3 class="mb-0 text-dark">الإعدادات</h3>
                <p class="mb-0 text-muted">إدارة إعدادات النظام والرسوم</p>
            </div>
        </div>

        @if (session('success'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bx bx-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        <!-- Consultation Price Setting -->
        <div class="col-xl-6 col-lg-8 col-md-10">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title d-flex align-items-center gap-2">
                        <i class="bx bx-money fs-20 text-primary"></i>
                        رسوم الاستشارة القانونية
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-semibold">مبلغ رسوم الاستشارة (بالريال السعودي)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bx bx-dollar-circle"></i>
                                </span>
                                <input type="number" name="consultation_price" step="0.01" min="1"
                                    class="form-control form-control-lg @error('consultation_price') is-invalid @enderror"
                                    value="{{ old('consultation_price', $consultationPrice) }}" placeholder="أدخل المبلغ">
                                <span class="input-group-text bg-light fw-semibold">SAR</span>
                            </div>
                            @error('consultation_price')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <small class="text-muted mt-1 d-block">
                                هذا المبلغ هو الذي سيظهر للعميل في صفحة طلب الاستشارة وسيتم تحصيله عبر بوابة Tap
                            </small>
                        </div>

                        <button type="submit" class="btn btn-primary d-inline-flex align-items-center gap-1">
                            <i class="bx bx-save"></i>
                            حفظ التغييرات
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
