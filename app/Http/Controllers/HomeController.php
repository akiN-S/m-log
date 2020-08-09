<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Method;
use App\Lib\MyFuncs;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $methodsLsist = MyFuncs::getMethodsList(Auth::id()); // ログインIDに紐づくデータを取得

        //ビューの表示
        // return view('testView', compact('mLog'));
        return view('input',['methodsLsist' => $methodsLsist]);
    }
}
