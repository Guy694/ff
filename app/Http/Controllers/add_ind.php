<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class add_ind extends Controller
{
    public function add_ind_page()
    {
        return view('page.add_ind');
    }

    public function add_exp_ind_page()
    {
        return view('page.add_exp_ind');
    }

}
