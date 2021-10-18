<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exp_indicator extends Model
{
    use HasFactory;
    protected $fillable = ['exind_num_name','exind_name','value_type','num2562','num2563','target2564','ind_id'];


}