<?php

namespace App\Http\Controllers;

use App\Models\indicator;
use Illuminate\Http\Request;
use App\Models\tsu_agency;
use App\Models\exp_indicator;

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
        $data = indicator::all();


        $data = indicator::join('exp_indicators', 'indicators.ind_id', '=', 'exp_indicators.ind_id')
        ->get(['*']);



        return view('home',compact('data'));


        // $data = tsu_agency::all();
        // return view('home',['tsu_agencies'=>$data]);
    }



































































        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }


}
