<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MLog extends Model
{
    //
    // protected $fillable = ['timestamp', 'currency', 'price', 'method', 'statement', 'store', 'branch', "location" ]; 
    protected $fillable = ['timestamp', 'currency', 'price' ]; 
}
