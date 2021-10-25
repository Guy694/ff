<?php

namespace App\Models;

use App\Http\Controllers\HomeController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class indicator extends Model
{
    use HasFactory;
    protected  $primaryKey = 'ind_id';
    protected $fillable = ['ind_name','agency_id'];

}