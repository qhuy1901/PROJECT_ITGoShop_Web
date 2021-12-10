<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class ReportController extends Controller
{
    public function print_revenue_report($tu_ngay, $den_ngay)
    {
        $statistic_info = DB::table('statistic')
        ->whereDate('StatisticDate','>=', $tu_ngay)
        ->whereDate('StatisticDate','<=', $den_ngay)->get();

        return View('report.print-revenue-report')
        ->with('tu_ngay', $tu_ngay)
        ->with('den_ngay', $den_ngay)
        ->with('statistic_info', $statistic_info);
    }
}
