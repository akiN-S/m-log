<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MLog extends Model
{
    //
    protected $fillable = ['timestamp', 'currency', 'price', 'method', 'statement', 'place', 'address', "location" ]; 
    // protected $fillable = ['timestampStr', 'timestamp', 'currency', 'price' ]; 
}
