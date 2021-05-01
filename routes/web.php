<?php

use Illuminate\Support\Facades\Route;

//ルートグループはいくつかのルートに対して一括で機能を追加したい場合に使用します。
//今回は認証ミドルウェアを複数のルートに一括して適用するために使いました。
//ミドルウェアは 'auth' という名前で指定されていますが、app/Http/Kernel.php というファイルに
//実際のクラスと名前の定義があります。
/*
このミドルウェアはアクセスしたユーザーの認証状態をチェックして、
ログインしていたらそのままコントローラーメソッド（または次のミドルウェア）に処理を渡します。
ログインしていなければログイン画面にリダイレクトさせます。
ミドルウェアはリクエストの交通整理をする
*/
Route::group(['middleware' => 'auth'], function() {
    // == Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

    // requestURL, Controller@method -> view(blade file) or route name used in template
    Route::get('/folders/{id}/tasks', 'App\Http\Controllers\TaskController@index')->name('tasks.index');

    Route::get('/folders/create', 'App\Http\Controllers\FolderController@showCreateForm')->name('folders.create');
    Route::post('/folders/create', 'App\Http\Controllers\FolderController@create');

    Route::get('/folders/{id}/tasks/create', 'App\Http\Controllers\TaskController@showCreateForm')->name('tasks.create');
    Route::post('/folders/{id}/tasks/create', 'App\Http\Controllers\TaskController@create');

    Route::get('/folders/{id}/tasks/{task_id}/edit', 'App\Http\Controllers\TaskController@showEditForm')->name('tasks.edit');
    Route::post('/folders/{id}/tasks/{task_id}/edit', 'App\Http\Controllers\TaskController@edit');
});

// added automatically by laravel/ui
Auth::routes();// alias in app.php

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

