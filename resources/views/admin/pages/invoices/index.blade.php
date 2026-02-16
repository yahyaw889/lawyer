@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h3 class="mb-0 text-dark">الفواتير</h3>
                <p class="mb-0 text-muted">إدارة وطباعة الفواتير للمدفوعات الناجحة</p>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>رقم الفاتورة</th>
                                    <th>العميل</th>
                                    <th>المبلغ</th>
                                    <th>التاريخ</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($invoices as $invoice)
                                    <tr>
                                        <td>INV-{{ str_pad($invoice->id, 6, '0', STR_PAD_LEFT) }}</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span>{{ $invoice->customer_name }}</span>
                                                <small class="text-muted">{{ $invoice->customer_email }}</small>
                                            </div>
                                        </td>
                                        <td>{{ $invoice->amount }} {{ $invoice->currency }}</td>
                                        <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('admin.invoices.show', $invoice->id) }}"
                                                class="btn btn-sm btn-info-transparent">
                                                <i class="ri-eye-line align-middle me-1"></i> عرض
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">لا توجد فواتير متاحة</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $invoices->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
