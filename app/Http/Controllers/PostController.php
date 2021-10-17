<?php

namespace App\Http\Controllers;

use App\Models\indicator;
use Illuminate\Http\Request;
use App\Models\tsu_agency;

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
        return view('page.add_ind');
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
            'ind_num_name' => 'required',
            'ind_name' => 'required'
            ]
        );

        indicator::create($request ->all());

        return  redirect()->route('home')->with('success','Post created Successfully');
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
    public function edit(indicator $post)
    {
        return view('page.edit_ind',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, indicator $post)
    {
        $request->validate(
            [
                'ind_num_name' => 'required',
                'ind_name' => 'required'
            ]
            );

            $post->update($request->all());

        return redirect()->route('home')->with('success','Post update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(indicator $post)
    {
        $post->delete();
        return redirect()->route('home')->with('success','Post delete Successfully.');
    }
}
