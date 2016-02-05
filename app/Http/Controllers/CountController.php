<?php

namespace App\Http\Controllers;

use App\Events\CountView;
use App\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountController extends Controller
{
    public function view($url) {
        $counter = URL::where('count_alt', $url)->first();

        return view('count', compact('counter'));
    }
}
