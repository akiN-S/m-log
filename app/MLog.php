<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MLog extends Model
{
    //
    protected $fillable = ['userId', 'usedTime', 'currency', 'price', 'method', 'methodId', 'statement', 'place', 'address', "location" ]; 
    // protected $fillable = ['timestampStr', 'timestamp', 'currency', 'price' ]; 
}
