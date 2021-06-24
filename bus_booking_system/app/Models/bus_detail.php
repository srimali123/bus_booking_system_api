<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bus_detail extends Model
{
    use HasFactory;
    protected $table = 'bus_detail';
    protected $fillable=['name','type','vehical_number'];
}
