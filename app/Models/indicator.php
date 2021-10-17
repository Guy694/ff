<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class indicator extends Model
{
    use HasFactory;
    protected $fillable = ['ind_num_name','ind_name',];
}
