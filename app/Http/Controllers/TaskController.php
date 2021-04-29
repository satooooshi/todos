<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class TaskController extends Controller
{
    public function index(int $id)
    {
        //return "Hello world";
        $folders = Folder::all();
        \Log::debug($folders);

        return view('tasks/index', [
            //key == variable in template => values
            'folders' => $folders,
            'current_folder_id' => $id,
        ]);
    }
}
