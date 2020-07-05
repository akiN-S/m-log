<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\MLog;

class MLogController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    // public function input() {
    //   return view('input');
    // }
    
    public function input(Request $request) {
      //入力値の取得
      $mLogReq = new MLog($request->all());
      
      //入力チェック
      $this->validate($request, [
        'timestampStr' => 'required',
        'currency' => 'required|max:5',
        'price' => 'required|max:5',
      ]);
      
      // var_dump($mLog); //debug

      $mLog = new MLog;
      $mLog->userId = Auth::id();
      $mLog->currency = $request->currency;
      // $mLog->usedTime = $request->usedTime; //TBC
      $mLog->price = $request->price;
      $mLog->methodId = $request->method; // TBC
      $mLog->statement = $request->statement;
      $mLog->place = $request->place;
      $mLog->address = $request->address;
      $mLog->location = $request->location;
      $mLog-> save();

      $mLogList = MLog::orderBy('created_at', 'asc')->get();

      //ビューの表示
      // return view('testView', compact('mLog'));
      return view('testView', ['list' => $mLogList]);

    }
    
    public function update(Request $request) {
      //セッションから取得
      $article = $request->session()->get('article');
      
      //DBの更新
      $article->save();
      
      //ビューの表示
      return redirect('test/complete');
    }
    
    public function complete(Request $request) {
      return view('complete');
    }

    public function list(Request $request) {

      $mLogList = MLog::orderBy('created_at', 'asc')->get();

      //ビューの表示
      // return view('testView', compact('mLog'));
      return view('testView', ['list' => $mLogList]);
      // return view('list');
    }
}
