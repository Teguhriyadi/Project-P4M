<?php

namespace App\Http\Controllers;

use App\Models\Model\Counter;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function index()
    {
        $currentDay = date('d');
        $currentMonth = date('m');
        $currentYear = date('Y');

        $counter = Counter::selectRaw('year(created_at) as tahun')->distinct()->get();
        $countToday = Counter::whereYear('created_at', $currentYear)->whereMonth('created_at', $currentMonth)->whereDay('created_at', $currentDay)->get();
        $countYesterday = Counter::whereYear('created_at', $currentYear)->whereMonth('created_at', $currentMonth)->whereDay('created_at', $currentDay-1)->get();
        $countWeek = Counter::selectRaw('YEARWEEK(created_at)')->whereRaw('YEARWEEK(created_at) = YEARWEEK(NOW())')->get();
        $countMonth = Counter::whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->get();
        $countYear = Counter::whereYear('created_at', $currentYear)->get();
        $countAll = Counter::all();

        // dd($countMonth->count());

        return view('admin.page.web.pengunjung.home', compact('counter', 'countToday', 'countYesterday', 'countWeek', 'countMonth', 'countYear', 'countAll'));
    }
}
