@extends('admin.layouts.master')


@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h4 class="mb-0">لوحة التحكم</h4>
                <p class="mb-0 text-muted">أهلاً بك، نظرة عامة على حالة الموظفين والشيفتات.</p>
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
                                <i class="bx bx-user-check fs-24"></i>
                            </span>
                        </div>
                        <div>
                            <p class="mb-1 text-muted">حضور اليوم</p>
                            <h4 class="fw-semibold mb-0">142 <span class="text-success fs-12 fw-normal ms-2"><i
                                        class="bx bx-up-arrow-alt"></i> +2.5%</span></h4>
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
                            <p class="mb-1 text-muted">تأخير اليوم</p>
                            <h4 class="fw-semibold mb-0">12 <span class="text-danger fs-12 fw-normal ms-2"><i
                                        class="bx bx-down-arrow-alt"></i> -0.5%</span></h4>
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
                                <i class="bx bx-user-x fs-24"></i>
                            </span>
                        </div>
                        <div>
                            <p class="mb-1 text-muted">في إجازة</p>
                            <h4 class="fw-semibold mb-0">8 <span class="text-muted fs-12 fw-normal ms-2">موظفين</span></h4>
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
                                <i class="bx bx-calendar-event fs-24"></i>
                            </span>
                        </div>
                        <div>
                            <p class="mb-1 text-muted">شيفتات مفتوحة</p>
                            <h4 class="fw-semibold mb-0">24 <span class="text-warning fs-12 fw-normal ms-2">شيفت</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="col-xl-8 col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">إحصائيات الحضور الأسبوعية</div>
                </div>
                <div class="card-body">
                    <div id="attendance-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">توزيع الموظفين حسب القسم</div>
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
                    <div class="card-title">سجل الحضور الأخير</div>
                    <a href="#" class="btn btn-sm btn-light">عرض الكل</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover border table-bordered">
                            <thead>
                                <tr>
                                    <th>الموظف</th>
                                    <th>القسم</th>
                                    <th>الوقت</th>
                                    <th>الحالة</th>
                                    <th>الشيفت</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <span
                                                    class="avatar avatar-sm rounded-circle bg-primary-transparent">أ</span>
                                            </div>
                                            <div>
                                                <span class="fw-semibold">أحمد محمد</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>تقنية المعلومات</td>
                                    <td>08:55 AM</td>
                                    <td><span class="badge bg-success-transparent">حاضر</span></td>
                                    <td>صباحي</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <span
                                                    class="avatar avatar-sm rounded-circle bg-warning-transparent">س</span>
                                            </div>
                                            <div>
                                                <span class="fw-semibold">سارة علي</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>الموارد البشرية</td>
                                    <td>09:10 AM</td>
                                    <td><span class="badge bg-warning-transparent">تأخير</span></td>
                                    <td>صباحي</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <span class="avatar avatar-sm rounded-circle bg-info-transparent">م</span>
                                            </div>
                                            <div>
                                                <span class="fw-semibold">محمد خالد</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>المبيعات</td>
                                    <td>08:50 AM</td>
                                    <td><span class="badge bg-success-transparent">حاضر</span></td>
                                    <td>صباحي</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <span class="avatar avatar-sm rounded-circle bg-pink-transparent">ن</span>
                                            </div>
                                            <div>
                                                <span class="fw-semibold">نورة سعد</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>التسويق</td>
                                    <td>--:--</td>
                                    <td><span class="badge bg-danger-transparent">غائب</span></td>
                                    <td>صباحي</td>
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
        // Attendance Chart
        var options1 = {
            series: [{
                name: 'حضور',
                data: [140, 142, 138, 145, 142, 110, 80]
            }, {
                name: 'غياب',
                data: [10, 8, 12, 5, 8, 40, 70]
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
            colors: ['#845adf', '#e6533c'],
            xaxis: {
                categories: ['السبت', 'الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة'],
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

        // Department Chart
        var options2 = {
            series: [44, 55, 41, 17, 15],
            chart: {
                type: 'donut',
                height: 280,
                fontFamily: 'Cairo, sans-serif'
            },
            labels: ['تقنية المعلومات', 'المبيعات', 'التسويق', 'الموارد البشرية', 'المالية'],
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
