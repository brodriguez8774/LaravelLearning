<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    # Appears comparable to C# contructors. Is called on every controller call?
    public function __construct()
    {
        $this->middleware('second');
    }

    # Needs to be explicitly called.
    public function showPath(Request $request){
        $uri = $request->path();
        echo '<br>URI: '.$uri;

        $url = $request->url();
        echo '<br>URL: '.$url;

        $method = $request->method();
        echo '<br>Method: '.$method;
    }
}
