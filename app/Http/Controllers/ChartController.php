<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DQClients;
use App\Models\clientcontract;
use DB;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartController extends Controller
{
    //

    public function index(LatestClientChart $chart)
{
    return view('admin.index', ['chart' => $chart->build()]);
} 
}
