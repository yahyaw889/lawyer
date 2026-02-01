@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h3 class="mb-0 text-dark">لوحة التحكم</h3>
                <p class="mb-0 text-muted">أهلاً بك، نظرة عامة على طلبات الخدمات والأنشطة.</p>
            </div>
            <div class="main-dashboard-header-right">
                <div class="d-flex my-xl-auto right-content">
                    <div class="mb-xl-0" id="p-date">
                        <button class="btn btn-primary d-inline-flex align-items-center">
                            <i class="bx bx-calendar me-1"></i> {{ date('d M Y') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Stats Cards -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <span class="avatar avatar-lg bg-primary-transparent rounded-circle">
                                <i class="bx bx-file-blank fs-24"></i>
                            </span>
                        </div>
                        <div>
                            <p class="mb-1 text-muted">إجمالي الطلبات</p>
                            <h4 class="fw-semibold mb-0">{{ $totalRequests }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <span class="avatar avatar-lg bg-secondary-transparent rounded-circle">
                                <i class="bx bx-time fs-24"></i>
                            </span>
                        </div>
                        <div>
                            <p class="mb-1 text-muted">طلبات اليوم</p>
                            <h4 class="fw-semibold mb-0">{{ $newRequestsToday }} <span
                                    class="text-success fs-12 fw-normal ms-2">جديد</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <span class="avatar avatar-lg bg-warning-transparent rounded-circle">
                                <i class="bx bx-loader fs-24"></i>
                            </span>
                        </div>
                        <div>
                            <p class="mb-1 text-muted">قيد المعالجة</p>
                            <h4 class="fw-semibold mb-0">{{ $pendingRequests }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <span class="avatar avatar-lg bg-success-transparent rounded-circle">
                                <i class="bx bx-check-circle fs-24"></i>
                            </span>
                        </div>
                        <div>
                            <p class="mb-1 text-muted">المكتملة</p>
                            <h4 class="fw-semibold mb-0">{{ $completedRequests }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="col-xl-8 col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">إحصائيات الطلبات (شهرياً)</div>
                </div>
                <div class="card-body">
                    <div id="attendance-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">توزيع الطلبات حسب النوع</div>
                </div>
                <div class="card-body">
                    <div id="department-chart"></div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">آخر الطلبات</div>
                    <a href="{{ route('admin.requests.index') }}" class="btn btn-sm btn-light">عرض الكل</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover border table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الخدمة</th>
                                    <th>الهاتف</th>
                                    <th>التاريخ</th>
                                    <th>الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentRequests as $request)
                                    <tr>
                                        <td>
                                            <span class="fw-semibold text-primary">#{{ $request->id }}</span>
                                        </td>
                                        <td>{{ $request->name }}</td>
                                        <td>{{ __('frontend.services_list.items.' . $request->service_type) }}</td>
                                        <td>{{ $request->phone }}</td>
                                        <td>{{ $request->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            @if ($request->status == 'pending')
                                                <span class="badge bg-warning-transparent">قيد الانتظار</span>
                                            @elseif($request->status == 'completed')
                                                <span class="badge bg-success-transparent">مكتمل</span>
                                            @else
                                                <span class="badge bg-light-transparent">{{ $request->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">لا توجد طلبات حديثة.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- APEXCHARTS JS -->
    <script src="{{ asset('build/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        // Requests Chart (Monthly)
        var options1 = {
            series: [{
                name: 'الطلبات',
                data: {!! json_encode($monthData) !!}
            }],
            chart: {
                height: 320,
                type: 'area',
                toolbar: {
                    show: false
                },
                fontFamily: 'Cairo, sans-serif'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            colors: ['#a41c1c'],
            xaxis: {
                categories: {!! json_encode($monthLabels) !!},
                labels: {
                    show: true,
                    style: {
                        colors: "#8c9097",
                        fontSize: '11px',
                        fontFamily: 'Cairo, sans-serif'
                    }
                }
            },
            yaxis: {
                labels: {
                    show: true,
                    style: {
                        colors: "#8c9097",
                        fontSize: '11px',
                        fontFamily: 'Cairo, sans-serif'
                    }
                }
            },
            grid: {
                borderColor: '#f2f5f7',
            }
        };
        var chart1 = new ApexCharts(document.querySelector("#attendance-chart"), options1);
        chart1.render();

        // Type Chart (Donut)
        var options2 = {
            series: {!! json_encode($typeData) !!},
            chart: {
                type: 'donut',
                height: 280,
                fontFamily: 'Cairo, sans-serif'
            },
            labels: {!! json_encode($typeLabels) !!},
            colors: ['#845adf', '#23b7e5', '#f5b849', '#e6533c', '#26bf94'],
            dataLabels: {
                enabled: false
            },
            legend: {
                position: 'bottom',
                fontFamily: 'Cairo, sans-serif'
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%',
                        background: 'transparent',
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontSize: '20px',
                                color: '#495057',
                                offsetY: -10
                            },
                            value: {
                                show: true,
                                fontSize: '16px',
                                color: undefined,
                                offsetY: 16,
                                formatter: function(val) {
                                    return val
                                }
                            },
                            total: {
                                show: true,
                                showAlways: false,
                                label: 'الإجمالي',
                                fontSize: '22px',
                                fontWeight: 600,
                                color: '#495057'
                            }
                        }
                    }
                }
            }
        };
        var chart2 = new ApexCharts(document.querySelector("#department-chart"), options2);
        chart2.render();
    </script>
@endsection
