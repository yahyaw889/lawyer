@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h3 class="mb-0 text-dark">المدفوعات</h3>
                <p class="mb-0 text-muted">سجل العمليات المالية والمدفوعات</p>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>المعرف</th>
                                    <th>العميل</th>
                                    <th>المبلغ</th>
                                    <th>التاريخ</th>
                                    <th>الحالة</th>
                                    <th>وسيلة الدفع</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($payments as $payment)
                                    <tr>
                                        <td>#{{ $payment->id }}</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span>{{ $payment->customer_name }}</span>
                                                <small class="text-muted">{{ $payment->customer_email }}</small>
                                            </div>
                                        </td>
                                        <td>{{ $payment->amount }} {{ $payment->currency }}</td>
                                        <td>{{ $payment->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            @if ($payment->status == 'CAPTURED' || $payment->status == 'COMPLETED')
                                                <span class="badge bg-success-transparent">مكتمل</span>
                                            @elseif($payment->status == 'PENDING' || $payment->status == 'INITIATED')
                                                <span class="badge bg-warning-transparent">انتظار</span>
                                            @elseif($payment->status == 'FAILED')
                                                <span class="badge bg-danger-transparent">فشل</span>
                                            @else
                                                <span class="badge bg-secondary-transparent">{{ $payment->status }}</span>
                                            @endif
                                        </td>
                                        <td>Tap Payments</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">لا توجد مدفوعات مسجلة</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $payments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
