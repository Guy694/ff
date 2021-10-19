<?php

namespace App\Http\Controllers;

use App\Models\exp_indicator;
use Illuminate\Http\Request;
use App\Models\indicator;

class ExpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $dataexp = indicator::find(3);
        return view('page.add_exp_ind',compact('dataexp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'exind_num_name' => 'required',
            'exind_name' => 'required',
            'value_type' => 'required',
            'num2562',
            'num2563',
            'target2564',
            'parent_id' => 'required'

            ]
        );

        exp_indicator::create($request ->all());

        return  redirect()->route('home')->with('success','บันทึกข้อมูลสำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\exp_indicator  $exp_indicator
     * @return \Illuminate\Http\Response
     */
    public function show(exp_indicator $exp_indicator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\exp_indicator  $exp_indicator
     * @return \Illuminate\Http\Response
     */
    public function edit($exp_indicator)
    {
        $datapost = exp_indicator::find($exp_indicator);
        return view('page.edit_exind',compact('datapost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\exp_indicator  $exp_indicator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$exp_indicator)
    {
        $request->validate([
            'exind_num_name' => 'required',
            'exind_name' => 'required',
            'exind_name' => 'required',
            'value_type' => 'required',
            'num2562' ,
            'num2563' ,
            'target2564'


            ]
        );
        $datapost = exp_indicator::find($exp_indicator);
        $datapost->update($request->all());

        return redirect()->route('home')->with('success','แก้ไขข้อมูลสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\exp_indicator  $exp_indicator
     * @return \Illuminate\Http\Response
     */
    public function destroy($exp_indicator)
    {
        $item = exp_indicator::where('exind_id',$exp_indicator);
        $item->delete();
        return redirect()->route('home')->with('success','ลบข้อมูลสำเร็จ');
    }
}