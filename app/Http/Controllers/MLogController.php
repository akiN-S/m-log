<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\MLog;
use App\Lib\MyFuncs;

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
      

      $mLog = new MLog;
      $mLog->userId = Auth::id();
      $mLog->currency = $request->currency;
      // $mLog->usedTime = $request->usedTime; //TBC
      $mLog->price = $request->price;
      $mLog->methodId = $request->method;
      $mLog->statement = $request->statement;
      $mLog->place = $request->place;
      $mLog->address = $request->address;
      $mLog->location = $request->location;
      $mLog-> save();

      
      $mLogList = MyFuncs::getMlogList(Auth::id()); // ログインIDに紐づくデータを取得
      // var_dump($mLogList); //debug

      //ビューの表示
      // return view('testView', compact('mLog'));
      return view('list', ['list' => $mLogList]); 

    }
    
    // public function update(Request $request) {
    //   //セッションから取得
    //   $article = $request->session()->get('article');
      
    //   //DBの更新
    //   $article->save();
      
    //   //ビューの表示
    //   return redirect('test/complete');
    // }

    public function update(Request $request) {

      //入力値の取得
      $editChecked = ($request->all()["edit"]);
      $btnMode = ($request->all()["btnMode"]);

      // var_dump($request->all());
      if ($btnMode == "CSV"){
        // $mLogResList = MLog::find($editChecked); // DBからID指定されたデータを取得
        $mLogResList = MyFuncs::getMlogList(Auth::id()); // ログインIDに紐づくデータを取得
        
        
        // CSV出力用意
        $headers = [ //ヘッダー情報
          'Content-type' => 'text/csv',
          'Content-Disposition' => 'attachment; filename=csvexport.csv',
          'Pragma' => 'no-cache',
          'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
          'Expires' => '0',
        ];

        $callback = function() use ($mLogResList)
        {
          $createCsvFile = fopen('php://output', 'w'); //ファイル作成

          foreach ($mLogResList as $row) {  //データを1行ずつ回す
              $csv = [//オブジェクトなので -> で取得
                  $row->usedTime,
                  "", // puls
                  $row->price,
                  $row->statement,
                  $row->place,
                  "", // sorePlace
                  "", // place
                  "", // time
                  $row->method,
                  $row->address,
              ];
              mb_convert_variables('SJIS-win', 'UTF-8', $csv); //文字化け対策

              fputcsv($createCsvFile, $csv); //ファイルに追記する
          }
          fclose($createCsvFile); //ファイル閉じる
        };
      
        return response()->stream($callback, 200, $headers); //ここで実行
        // return view('testView', ['list' => $mLogResList]);
      }elseif ($btnMode == "Delete"){

        return view('testView');
      }
    }
    
    public function complete(Request $request) {
      return view('complete');
    }

    public function list(Request $request) {

      // $mLogList = MLog::orderBy('created_at', 'asc')->get();
      $mLogList = MyFuncs::getMlogList(Auth::id()); // ログインIDに紐づくデータを取得

      //ビューの表示
      // return view('testView', compact('mLog'));
      return view('list', ['list' => $mLogList]);
      // return view('list');
    }


}
