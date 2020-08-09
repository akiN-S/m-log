<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    //
    protected $fillable = ['id', 'userId', 'method']; 
    // protected $fillable = ['timestampStr', 'timestamp', 'currency', 'price' ]; 
}
