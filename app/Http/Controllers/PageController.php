<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homeView(){

        $tasks=Task::all();
        $authUser = auth()->user();
        return view('home', compact(['tasks','authUser']));
    }
}
