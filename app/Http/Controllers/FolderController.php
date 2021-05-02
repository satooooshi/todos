<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Task;
use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{
    
    // get
    public function showCreateForm()
    {
        return view('folders/create');
    }


    //post
    public function create(CreateFolder $request)
    {
    // フォルダモデルのインスタンスを作成する
    $folder = new Folder();
    // タイトルに入力値を代入する
    $folder->title = $request->title;
    // インスタンスの状態をデータベースに書き込む
    //$folder->save();
    \Auth::user()->folders()->save($folder);

    return redirect()->route('tasks.index', [
        'folder' => $folder->id,
    ]);
}   

}
