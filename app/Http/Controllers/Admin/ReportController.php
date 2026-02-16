<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // 1. Total Revenue (Captured/Completed)
        $totalRevenue = PaymentTransaction::whereIn('status', ['CAPTURED', 'COMPLETED'])->sum('amount');
        
        // 2. Total Transactions Count
        $totalTransactions = PaymentTransaction::count();

        // 3. Success Rate
        $successfulTransactions = PaymentTransaction::whereIn('status', ['CAPTURED', 'COMPLETED'])->count();
        $successRate = $totalTransactions > 0 ? round(($successfulTransactions / $totalTransactions) * 100, 1) : 0;

        // 4. Monthly Revenue (Last 6 Months)
        $monthlyRevenue = PaymentTransaction::whereIn('status', ['CAPTURED', 'COMPLETED'])
            ->select(
                DB::raw('sum(amount) as total'), 
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month_year"),
                DB::raw('MONTH(created_at) as month')
            )
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('month_year', 'month')
            ->orderBy('month_year')
            ->get();

        $revenueLabels = [];
        $revenueData = [];

        foreach($monthlyRevenue as $record) {
            $revenueLabels[] = Carbon::createFromFormat('m', $record->month)->translatedFormat('F');
            $revenueData[] = $record->total;
        }

        return view('admin.pages.reports.index', compact(
            'totalRevenue',
            'totalTransactions',
            'successRate',
            'revenueLabels',
            'revenueData'
        ));
    }
}
