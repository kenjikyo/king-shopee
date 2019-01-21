<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function getDashboard(){
        return view('System.Dashboard.Index');
    }

    public function getStatistic(){
        return view('System.Statistic.Index');
    }
}
