<?php

namespace App\Http\Controllers;

use App\Models\ex_side_list;
use App\Models\indicator;
use Illuminate\Http\Request;
use App\Models\tsu_agency;
use App\Models\relation;
use App\Models\exp_indicator;


use function GuzzleHttp\Promise\all;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        // $data = new relation();
        // $ind_list = $data->getdata('SELECT * FROM  indicator_list;');

        // return view('page.add_ind',compact('ind_list'));


    }

    public function create2($agency)
    {

        $dropdow = new relation();
        $drop_listed = $dropdow->getdata('SELECT * FROM  indicators WHERE agency_id = '.$agency.';');

        $data = new relation();
        $ind_list = $data->getdata('SELECT * FROM  indicator_list;');

        return view('page.add_ind',compact('ind_list','drop_listed'));


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
            // 'ind_num_name',
            'ind_name' => 'required',
            'agency_id'=> 'required',
            ]
        );

        indicator::create($request ->all());

        return  redirect()->route('home')->with('success','บันทึกข้อมูลสำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(indicator $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {

        // $data = new relation();
        // $datapost = $data->getdata('select * from indicators where ind_id ="'.$post.'";');
         $datapost = indicator::find($post);


        // return view('page.edit_ind',compact('post'));


        return view('page.edit_ind',compact('datapost'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$post)

    {
        $request->validate(
            [
                // 'ind_num_name',
                'ind_name'=> 'required'

            ]
            );
            $datapost = indicator::find($post);
            $datapost->update($request->all());

        return redirect()->route('home')->with('success','แก้ไขข้อมูลสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $item = indicator::where('ind_id',$post);
        $item->delete();
        $item_ex = exp_indicator::where('parent_id',$post);
        $item_ex->delete();
        // $item_side = ex_side_list::where('exind_id',$item_ex->exind_id);
        // $item_side->delete();

        return redirect()->route('home')->with('success','ลบข้อมูลสำเร็จ');
    }



}