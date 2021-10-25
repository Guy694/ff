<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ex_side_list extends Model
{
    use HasFactory;
    protected $primaryKey = 'ex_side_list_id';
    protected $fillable = ['ex_side_list_name','num2562','num2563','target2564','exind_id'];


}