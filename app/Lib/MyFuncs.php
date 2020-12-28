<?php
namespace App\Lib;
use Illuminate\Support\Facades\DB;
use App\MLog;
use App\Method;

class Myfuncs {
    public static function getMlogList($userId){
        $list =  Mlog::where('m_logs.userId', $userId)
        ->join('methods','m_logs.methodId','=','methods.id')
        ->orderBy('m_logs.usedTime', 'asc')
        ->get();
        return $list;
    }

    public static function getMlogLastItem($userId){
        // 最後に入力された内容を参考にするためにアイテムの最終行を1行だけ取得
        $list =  Mlog::where('m_logs.userId', $userId)
        ->join('methods','m_logs.methodId','=','methods.id')
        ->orderBy('m_logs.usedTime', 'desc')
        ->take(1)
        ->get();
        return $list;
    }

    public static function getMethodsList($userId){
        $list = Method::where('userId', $userId)->orderBy('method', 'asc')->get();
        return $list;
    }
}


