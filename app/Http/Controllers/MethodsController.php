<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Method;
use App\Lib\MyFuncs;

class MethodsController extends Controller
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

      //ビューの表示
      return view('methods.methodsInput');
    }
    
    public function register(Request $request) {
      //入力値の取得
      // $methodReq = new Method($request->all());
      
      //入力チェック
      $this->validate($request, [
        'method' => 'required|max:30',
      ]);
      
      $method = new Method;
      $method->userId = Auth::id();
      $method->method = $request->method;
      $method-> save();

      $methodLsist = MyFuncs::getMethodsList(Auth::id()); // ログインIDに紐づくデータを取得
      // var_dump($mLogList); //debug

      //ビューの表示
      // return view('testView', compact('mLog'));
      return view('methods.methodsList', ['list' => $methodLsist]); 

    }
    
    // public function update(Request $request) {
    //   //セッションから取得
    //   $article = $request->session()->get('article');
      
    //   //DBの更新
    //   $article->save();
      
    //   //ビューの表示
    //   return redirect('test/complete');
    // }

        
    public function complete(Request $request) {
      return view('complete');
    }

    public function list(Request $request) {

      $methodsLsist = MyFuncs::getMethodsList(Auth::id()); // ログインIDに紐づくデータを取得

      //ビューの表示
      // return view('testView', compact('mLog'));
      return view('methods.methodsList', ['list' => $methodsLsist]);
      // return view('list');
    }
}
