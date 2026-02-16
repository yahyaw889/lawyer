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

                        <hr class="my-4 border-light">

                        <h5 class="mb-3 text-dark fw-bold">
                            <i class="bx bx-credit-card me-2 text-primary"></i>
                            إعدادات بوابة الدفع (Tap Payments)
                        </h5>

                        <!-- Tap Public Key -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Public Key</label>
                            <input type="text" name="tap_public_key"
                                class="form-control @error('tap_public_key') is-invalid @enderror"
                                value="{{ old('tap_public_key', \App\Models\SystemSetting::getValue('tap_public_key')) }}"
                                placeholder="pk_test_...">
                            @error('tap_public_key')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tap Secret Key -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Secret Key</label>
                            <div class="input-group">
                                <input type="password" name="tap_secret_key" id="tap_secret_key"
                                    class="form-control @error('tap_secret_key') is-invalid @enderror"
                                    value="{{ old('tap_secret_key', \App\Models\SystemSetting::getValue('tap_secret_key')) }}"
                                    placeholder="sk_test_...">
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="togglePassword('tap_secret_key')">
                                    <i class="bx bx-show"></i>
                                </button>
                            </div>
                            @error('tap_secret_key')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tap Merchant ID -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Merchant ID</label>
                            <input type="text" name="tap_merchant_id"
                                class="form-control @error('tap_merchant_id') is-invalid @enderror"
                                value="{{ old('tap_merchant_id', \App\Models\SystemSetting::getValue('tap_merchant_id')) }}"
                                placeholder="Merchant ID">
                            @error('tap_merchant_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary d-inline-flex align-items-center gap-1">
                            <i class="bx bx-save"></i>
                            حفظ التغييرات
                        </button>

                        <script>
                            function togglePassword(id) {
                                const input = document.getElementById(id);
                                if (input.type === "password") {
                                    input.type = "text";
                                } else {
                                    input.type = "password";
                                }
                            }
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
