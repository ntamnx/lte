<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;

class HomeController extends Controller {

    public function index() {
        return view('home');
    }

}
