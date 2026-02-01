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
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">لا توجد طلبات استشارة حتى الان</td>
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
@endsection
