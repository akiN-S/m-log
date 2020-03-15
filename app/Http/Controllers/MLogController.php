<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MLog;

class MLogController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    public function input() {
      return view('input');
    }
    
    public function send(Request $request) {
      //入力値の取得
      $mLog = new MLog($request->all());
      
      //入力チェック
      $this->validate($request, [
        'timestamp' => 'required|max:5|alpha',
        'currency' => 'required|max:5|alpha',
        'price' => 'required|max:5|alpha',
      ]);
      
      //セッションに保存
      $request->session()->put('mLog', $mLog);
      
      //ビューの表示
      return view('testView', compact('mLog'));
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
}
