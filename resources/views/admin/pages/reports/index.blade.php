@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h3 class="mb-0 text-dark">التقارير المالية</h3>
                <p class="mb-0 text-muted">تحليل الأداء المالي والمدفوعات</p>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="card-title mb-1">إجمالي الإيرادات</h6>
                                <h3 class="font-weight-bold mb-0 text-success">{{ number_format($totalRevenue, 2) }} <small
                                        class="fs-14 text-muted">SAR</small></h3>
                            </div>
                            <div class="icon-box bg-success-transparent rounded-circle">
                                <i class="ri-money-dollar-circle-line fs-24 text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="card-title mb-1">عدد المعاملات</h6>
                                <h3 class="font-weight-bold mb-0 text-primary">{{ $totalTransactions }}</h3>
                            </div>
                            <div class="icon-box bg-primary-transparent rounded-circle">
                                <i class="ri-exchange-line fs-24 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="card-title mb-1">نسبة النجاح</h6>
                                <h3 class="font-weight-bold mb-0 text-warning">{{ $successRate }}%</h3>
                            </div>
                            <div class="icon-box bg-warning-transparent rounded-circle">
                                <i class="ri-pie-chart-line fs-24 text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">نمو الإيرادات (آخر 6 أشهر)</div>
                    </div>
                    <div class="card-body">
                        <div id="revenueChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                name: 'الإيرادات',
                data: @json($revenueData)
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                categories: @json($revenueLabels)
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " SAR"
                    }
                }
            },
            colors: ['#28a745']
        };

        var chart = new ApexCharts(document.querySelector("#revenueChart"), options);
        chart.render();
    </script>
@endsection
