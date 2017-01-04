<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;

class HomeController extends Controller {

    public function index() {
//       
         JavaScript::put([
            'foo'  => 'bar',
            'user' => \App\Entities\User::first(),
            'age'  => 29
        ]);
        return view('categories.add');
    }

}
