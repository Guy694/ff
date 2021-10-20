<?php

namespace App\Http\Controllers;

use App\Models\indicator;
use Illuminate\Http\Request;
use App\Models\tsu_agency;
use App\Models\exp_indicator;
use App\Models\relation;
use App\Models\User;
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
        $user = auth()->user()->agency_id;
        $relation = new relation();

        $relat = $relation->getdata('select * from indicators where agency_id ='.$user.';');
        $subrelat = $relation->getdata('select * from exp_indicators;');

        // $categories = indicator::whereNull('ind_id')->with('childs')->get();
        // $data = indicator::all();
        // $dataexp = exp_indicator::all();
        // $data = indicator::join('exp_indicators', 'indicators.ind_id', '=', 'exp_indicators.parent_id')->get(['*']);
        return view('home',compact('relat','subrelat'));


        // $data = tsu_agency::all();

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