@extends('admin.layouts.master')


@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h4 class="mb-0">لوحة التحكم</h4>
                <p class="mb-0 text-muted">أهلاً بك، نظرة عامة على القضايا والمهام اليومية.</p>
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
                                <i class="bx bx-gavel fs-24"></i>
                            </span>
                        </div>
                        <div>
                            <p class="mb-1 text-muted">القضايا النشطة</p>
                            <h4 class="fw-semibold mb-0">42 <span class="text-success fs-12 fw-normal ms-2"><i
                                        class="bx bx-up-arrow-alt"></i> +5</span></h4>
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
                            <p class="mb-1 text-muted">جلسات اليوم</p>
                            <h4 class="fw-semibold mb-0">8 <span class="text-warning fs-12 fw-normal ms-2">جلسات</span></h4>
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
                                <i class="bx bx-user-plus fs-24"></i>
                            </span>
                        </div>
                        <div>
                            <p class="mb-1 text-muted">عملاء جدد (شهر)</p>
                            <h4 class="fw-semibold mb-0">15 <span class="text-success fs-12 fw-normal ms-2"><i
                                        class="bx bx-up-arrow-alt"></i> +12%</span></h4>
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
                            <span class="avatar avatar-lg bg-info-transparent rounded-circle">
                                <i class="bx bx-file border-info border border-opacity-25 fs-24"></i>
                            </span>
                        </div>
                        <div>
                            <p class="mb-1 text-muted">استشارات معلقة</p>
                            <h4 class="fw-semibold mb-0">6 <span class="text-danger fs-12 fw-normal ms-2">عاجل</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="col-xl-8 col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">إحصائيات القضايا (شهرياً)</div>
                </div>
                <div class="card-body">
                    <div id="attendance-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">توزيع القضايا حسب النوع</div>
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
                    <div class="card-title">آخر تحديثات القضايا</div>
                    <a href="#" class="btn btn-sm btn-light">عرض الكل</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover border table-bordered">
                            <thead>
                                <tr>
                                    <th>رقم القضية</th>
                                    <th>الموكل</th>
                                    <th>نوع القضية</th>
                                    <th>آخر إجراء</th>
                                    <th>الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="fw-semibold text-primary">#CASE-2024-001</span>
                                    </td>
                                    <td>شركة الراوج القابضة</td>
                                    <td>تجاري</td>
                                    <td>تم تقديم مذكرة</td>
                                    <td><span class="badge bg-info-transparent">جاري العمل</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-semibold text-primary">#CASE-2024-042</span>
                                    </td>
                                    <td>أحمد عبد الله</td>
                                    <td>أحوال شخصية</td>
                                    <td>حكم ابتدائي</td>
                                    <td><span class="badge bg-success-transparent">منتهية</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-semibold text-primary">#CASE-2024-089</span>
                                    </td>
                                    <td>مؤسسة البناء الحديث</td>
                                    <td>عمالي</td>
                                    <td>جلسة قادمة (غداً)</td>
                                    <td><span class="badge bg-warning-transparent">جلسة</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-semibold text-primary">#CASE-2024-112</span>
                                    </td>
                                    <td>سارة محمد</td>
                                    <td>مدني</td>
                                    <td>انتظار رد الخصم</td>
                                    <td><span class="badge bg-warning-transparent">معلق</span></td>
                                </tr>
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
        // Cases Chart (Was Attendance)
        var options1 = {
            series: [{
                name: 'قضايا جديدة',
                data: [5, 8, 12, 15, 10, 8, 14]
            }, {
                name: 'قضايا مغلقة',
                data: [3, 4, 8, 5, 2, 4, 6]
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
            colors: ['#845adf', '#26bf94'],
            xaxis: {
                categories: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو'],
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

        // Type Chart (Was Department)
        var options2 = {
            series: [35, 25, 20, 15, 5],
            chart: {
                type: 'donut',
                height: 280,
                fontFamily: 'Cairo, sans-serif'
            },
            labels: ['تجارية', 'أحوال شخصية', 'عمالية', 'جنائية', 'إدارية'],
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
                                    return val + "%"
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
