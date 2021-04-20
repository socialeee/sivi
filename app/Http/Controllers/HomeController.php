<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pelangganm = Pelanggan::select('id', 'created_at')
                                        ->whereYear('created_at', date('Y'))
                                        ->get()
                                        ->groupBy(function($date){
                                            return Carbon::parse($date->created_at)->format('m');
                                        });

        $pelangganmcount = [];
        $pelangganArrm = [];
        foreach($pelangganm as $key => $value) {
            $pelangganmcount[(int)$key] = count($value);
        }
        $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        for($i = 1; $i <= 12; $i++) {
            if(!empty($pelangganmcount[$i])){
                $pelangganArrm[$i]['count'] = $pelangganmcount[$i];
            } else {
                $pelangganArrm[$i]['count'] = 0;
            }
            $pelangganArrm[$i]['month'] = $month[$i-1];
        }

        $datam = [];
        foreach($pelangganArrm as $key => $value) {
            $datam[$key] = $value['count'];
        }

        $tahun = Carbon::now()->year;
        // dd($tahun);

        $pelangganw =pelanggan::select ('id', 'created_at')
                                        ->whereYear('created_at', date('Y'))
                                        ->whereMonth('created_at', date('m'))
                                        ->get()
                                        ->groupBy(function($date){
                                            return Carbon::parse($date->created_at)->format('W');
                                        });
        $pelangganwcount = [];
        $pelangganArrw = [];
        foreach($pelangganw as $key => $value) {
            $pelangganwcount[(int)$key] = count($value);
        }
        $week = ['1', '2', '3', '4'];
        for($i = 1; $i <= 4; $i++){
            if(!empty($pelangganwcount[$i])){
                $pelangganArrw[$i]['count'] = $pelangganwcount[$i];
            } else {
                $pelangganArrw [$i]['count'] = 0;
            }
            $pelangganArrw [$i] ['week'] = $week [$i-1];
        }
        $dataw = [];
        foreach ($pelangganArrw as $key => $value) {
            $dataw[$key] = $value['count'];
        }
        dd($pelangganArrw);
        return view('home', compact('datam', 'dataw', 'tahun'));
    }
}
