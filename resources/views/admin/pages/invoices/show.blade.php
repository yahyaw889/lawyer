@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h3 class="mb-0 text-dark">تفاصيل الفاتورة #INV-{{ str_pad($invoice->id, 6, '0', STR_PAD_LEFT) }}</h3>
            </div>
            <button class="btn btn-primary" onclick="window.print()">
                <i class="ri-printer-line me-1"></i> طباعة الفاتورة
            </button>
        </div>

        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header d-md-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/logo.png') }}" class="desktop-logo" alt="logo" height="40">
                        <div class="ms-3">
                            <h5 class="mb-0">AMN Global Law Firm</h5>
                            <p class="mb-0 text-muted">الاستشارات القانونية المتخصصة</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3">معلومات العميل:</h6>
                            <div><strong>الاسم:</strong> {{ $invoice->customer_name }}</div>
                            <div><strong>البريد الإلكتروني:</strong> {{ $invoice->customer_email }}</div>
                            <div><strong>رقم الهاتف:</strong> {{ $invoice->customer_phone }}</div>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <h6 class="mb-3">تفاصيل الفاتورة:</h6>
                            <div><strong>رقم الفاتورة:</strong> #INV-{{ str_pad($invoice->id, 6, '0', STR_PAD_LEFT) }}</div>
                            <div><strong>تاريخ الإصدار:</strong> {{ $invoice->created_at->format('d/m/Y') }}</div>
                            <div><strong>الحالة:</strong> <span class="badge bg-success">مدفوعة</span></div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>الوصف</th>
                                    <th class="text-end">المبلغ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>رسوم استشارة قانونية (#{{ $invoice->consultation_request_id }})</td>
                                    <td class="text-end fw-bold">{{ $invoice->amount }} {{ $invoice->currency }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-4 col-sm-5 ms-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left"><strong>المجموع الكلي</strong></td>
                                        <td class="right text-end"><strong>{{ $invoice->amount }}
                                                {{ $invoice->currency }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    شكراً لثقتكم بنا. هذه فاتورة إلكترونية لا تحتاج إلى توقيع.
                </div>
            </div>
        </div>
    </div>
@endsection
