<?php

namespace App\Http\Controllers;

use App\Models\exp_indicator;
use Illuminate\Http\Request;
use App\Models\indicator;
use App\Models\relation;
use App\Models\ex_side_list;
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

        // $dataexp = indicator::find(3);
        // return view('page.add_exp_ind',compact('dataexp'));
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
            'exind_num_name'=> 'required',
            'exind_name' => 'required',
            // 'value_type' => 'required',
            'num2562',
            'num2563',
            'target2564',
            'parent_id' => 'required',
            'symbol_id'=> 'required',

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
    public function show($exp_indicator)
    {
        $data = new relation();
        $ind_list = $data->getdata('SELECT * FROM  indicator_list ;');
        $symbol = $data->getdata('SELECT * FROM  symbol ;');
        $dataexp = indicator::find($exp_indicator);
        return view('page.add_exp_ind',compact('dataexp','ind_list','symbol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\exp_indicator  $exp_indicator
     * @return \Illuminate\Http\Response
     */
    public function edit($exp_indicator)
    {
        $relation = new relation();
        $datapost = exp_indicator::find($exp_indicator);
        $datasymbol  = $relation->getdata('SELECT * FROM symbol ');
        return view('page.edit_exind',compact('datapost','datasymbol'));
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
            'exind_num_name',
            'exind_name' => 'required',
            // 'value_type' => 'required',
            'num2562' ,
            'num2563' ,
            'target2564',


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
        $item_side = ex_side_list::where('exind_id',$exp_indicator);
        $item_side->delete();
        $item->delete();
        return redirect()->route('home')->with('success','ลบข้อมูลสำเร็จ');
    }


// --------------------------------------------------------------------------------------------------------














// EXPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP INDICATOR


public function show_is($exp,$exp2)
{
    $data = new relation();
    $exind_list = $data->getdata('SELECT * FROM  exindicator_list where exindicator_list_type = "'.$exp2.'"');
    $dataexp = indicator::find($exp);
    return view('page.add_exp_ind_is_academic',compact('dataexp','exind_list'));
}





    public function store_is(Request $request)
    {
        $request->validate([
            'exind_num_name',
            'exind_name' => 'required',
            // 'value_type' => 'required',
            'num2562',
            'num2563',
            'target2564',
            'parent_id' => 'required',
            'symbol_id'

            ]
        );

        exp_indicator::create($request ->all());

        return  redirect()->route('home')->with('success','บันทึกข้อมูลสำเร็จ');

    }





    public function edit_is($exp_indicator)
    {
        $datapost = exp_indicator::find($exp_indicator);
        $relation = new relation();

        return view('page.edit_exind_is_academic',compact('datapost'));
    }

    public function update_is(Request $request,$exp_indicator)
    {
        $request->validate([
            'exind_num_name',
            'exind_name' => 'required',
            'num2562' ,
            'num2563' ,
            'target2564',
            ]
        );
        $datapost = exp_indicator::find($exp_indicator);
        $datapost->update($request->all());

        return redirect()->route('home')->with('success','แก้ไขข้อมูลสำเร็จ');
    }

    public function destroy_is($exp_indicator)
    {
        $item = exp_indicator::where('exind_id',$exp_indicator);
        $item_side = ex_side_list::where('exind_id',$exp_indicator);
        $item_side->delete();
        $item->delete();
        return redirect()->route('home')->with('success','ลบข้อมูลสำเร็จ');
    }

// --------------------------------------------------------------------------------------------------------
















    //Ex SIDE  INDICATOR

public function show_exside($exp)
{

    $exind = exp_indicator::find($exp);
    return view('page.add_ex_side_academic',compact('exind'));
}





    public function store_exside(Request $request)
    {
        $request->validate([

            'ex_side_list_name' => 'required',
            'num2562',
            'num2563',
            'target2564',
            'exind_id' => 'required',

            ]
        );

        ex_side_list::create($request ->all());

        return  redirect()->route('home')->with('success','บันทึกข้อมูลสำเร็จ');

    }





    public function edit_exside($exp_side)
    {
        $datapost = ex_side_list::find($exp_side);
        $relation = new relation();

        return view('page.edit_ex_side_academic',compact('datapost'));
    }

    public function update_exside(Request $request,$exp_side)
    {
        $request->validate([
            'ex_side_list_name' => 'required',
            'num2562',
            'num2563',
            'target2564',

            ]
        );
        $datapost = ex_side_list::find($exp_side);
        $datapost->update($request->all());

        return redirect()->route('home')->with('success','แก้ไขข้อมูลสำเร็จ');

    }

    public function destroy_exside($exp_side)
    {
        $item = ex_side_list::where('ex_side_list_id',$exp_side);
        $item->delete();
        return redirect()->route('home')->with('success','ลบข้อมูลสำเร็จ');
    }

// --------------------------------------------------------------------------------------------------------------------------------













    // SIDE  INDICATOR

public function show_side($exp)
{

    $exind = exp_indicator::find($exp);
    return view('page.add_side',compact('exind'));
}





    public function store_side(Request $request)
    {
        $request->validate([

            'ex_side_list_name' => 'required',
            'num2562',
            'num2563',
            'target2564',
            'exind_id' => 'required',

            ]
        );

        ex_side_list::create($request ->all());

        return  redirect()->route('home')->with('success','บันทึกข้อมูลสำเร็จ');

    }





    public function edit_side($exp_side)
    {
        $datapost = ex_side_list::find($exp_side);
        $relation = new relation();

        return view('page.edit_side',compact('datapost'));
    }

    public function update_side(Request $request,$exp_side)
    {
        $request->validate([
            'ex_side_list_name' => 'required',
            'num2562',
            'num2563',
            'target2564',

            ]
        );
        $datapost = ex_side_list::find($exp_side);
        $datapost->update($request->all());

        return redirect()->route('home')->with('success','แก้ไขข้อมูลสำเร็จ');

    }

    public function destroy_side($exp_side)
    {
        $item = ex_side_list::where('ex_side_list_id',$exp_side);
        $item->delete();
        return redirect()->route('home')->with('success','ลบข้อมูลสำเร็จ');
    }







}