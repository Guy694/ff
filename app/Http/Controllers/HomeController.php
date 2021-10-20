<?php

namespace App\Http\Controllers;

use App\Models\indicator;
use Illuminate\Http\Request;
use App\Models\tsu_agency;
use App\Models\exp_indicator;
use App\Models\relation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
        /*
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }


    public function userlist(){
        $userdatas = new relation();

        $userdata = $userdatas->getdata('select * from Users ;');

        return view('adminpage.userlist',compact('userdata'));
    }


    public function register(){

        $agencies = new relation();

        $agency = $agencies->getdata('SELECT * FROM  tsu_agency;');

        return view('adminpage.register',compact('agency'));


    }


    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'name',
            'agency_id'=> 'required',
        ],


        );



        // User::create($request ->input([
        //     'name' => $request['name'],
        //     'username' => $request['username'],
        //     'password' => Hash::make($request['password']),

        // ]
        // ));



        User::create($request ->all());

        return  redirect()->route('home.userlist')->with('success','บันทึกข้อมูลสำเร็จ');
    }


    public function edit($user)
    {

         $user = User::find($user);



        // $agency = $agencies->getdata('SELECT *
        // FROM users
        // INNER JOIN tsu_agency
        // ON users.agency_id = tsu_agency.agency_id;');

        return view('adminpage.user_edit',compact('user'));

    }


    public function update(Request $request,$user)

    {
        $request->validate(
            [
            'username' => 'required|unique:username',
            'password' => 'required',
            'name' => 'required',
            'agency_id'=> 'required',
            ]
            );
            $user = User::find($user);
            $user->update($request->all());

        return redirect()->route('home.userlist')->with('success','แก้ไขข้อมูลสำเร็จ');
    }


    public function destroy($user)
    {
        $item = User::where('id',$user);
        $item->delete();
        return redirect()->route('home.userlist')->with('success','ลบข้อมูลสำเร็จ');
    }





































    public function managedata(){

        return view('adminpage.managedata');
    }







}