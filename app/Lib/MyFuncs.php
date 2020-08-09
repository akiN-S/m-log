<?php
namespace App\Lib;
use Illuminate\Support\Facades\DB;
use App\MLog;
use App\Method;

class Myfuncs {
    public static function getMlogList($userId){
        $list =  Mlog::where('m_logs.userId', $userId)
        ->join('methods','m_logs.methodId','=','methods.id')
        ->orderBy('m_logs.created_at', 'asc')
        ->get();
        return $list;
    }

    public static function getMethodsList($userId){
        $list = Method::where('userId', $userId)->orderBy('method', 'asc')->get();
        return $list;
    }
}


