<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard(){
        $saleSummaryToday = DB::table('sales')
            ->whereDate('sale_date', Carbon::today())
            ->sum('sale_amount');

        $saleSummaryYesterday = DB::table('sales')
            ->whereDate('sale_date', Carbon::yesterday())
            ->sum('sale_amount');

        $saleSummaryThisMonth = DB::table('sales')
            ->whereMonth('sale_date', Carbon::now()->month)
            ->whereYear('sale_date', Carbon::now()->year)
            ->sum('sale_amount');

        $saleSummaryLastMonth = DB::table('sales')
            ->whereMonth('sale_date', Carbon::now()->subMonth()->month)
            ->whereYear('sale_date', Carbon::now()->subMonth()->year)
            ->sum('sale_amount');

        return view('dashboard', compact('saleSummaryToday', 'saleSummaryYesterday', 'saleSummaryThisMonth', 'saleSummaryLastMonth'));
    }
}
