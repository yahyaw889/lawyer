<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. KPI Stats
        $totalRequests = ServiceRequest::count();
        $newRequestsToday = ServiceRequest::whereDate('created_at', Carbon::today())->count();
        $pendingRequests = ServiceRequest::where('status', 'pending')->count();
        $completedRequests = ServiceRequest::where('status', 'completed')->count();

        // 2. Recent Activity (Last 5)
        $recentRequests = ServiceRequest::latest()->take(5)->get();

        // 3. Chart: Requests per Month (Last 6 Months)
        $monthlyStats = ServiceRequest::select(
            DB::raw('count(id) as count'), 
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month_year"),
            DB::raw('MONTH(created_at) as month')
        )
        ->where('created_at', '>=', Carbon::now()->subMonths(6))
        ->groupBy('month_year', 'month')
        ->orderBy('month_year')
        ->get();

        $monthLabels = [];
        $monthData = [];

        // Fill data (ensure all months are present or just map existing)
        // For simplicity, we just map existing data. 
        // In a real app, you might want to fill zeroes for missing months.
        foreach($monthlyStats as $stat) {
            $monthLabels[] = Carbon::createFromFormat('m', $stat->month)->translatedFormat('F'); // Arabic Month Name
            $monthData[] = $stat->count;
        }

        // 4. Chart: Requests by Type
        $typeStats = ServiceRequest::select('service_type', DB::raw('count(*) as total'))
            ->groupBy('service_type')
            ->pluck('total', 'service_type');

        $typeLabels = $typeStats->keys()->map(fn($type) => __('frontend.services_list.items.'.$type))->toArray();
        $typeData = $typeStats->values()->toArray();


        return view('admin.pages.home', compact(
            'totalRequests', 
            'newRequestsToday', 
            'pendingRequests', 
            'completedRequests', 
            'recentRequests',
            'monthLabels',
            'monthData',
            'typeLabels',
            'typeData'
        ));
    }
}
