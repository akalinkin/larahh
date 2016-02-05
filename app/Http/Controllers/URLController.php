<?php

namespace App\Http\Controllers;

use App\URL;
use Illuminate\Http\Request;

class URLController extends Controller
{
    public function redirect($url) {
        try {
            $link = URL::where('url', $url)->first();
            return redirect($link->alt);
        } catch (\Exception $e) {
            return json_encode('URL not found.');
        }
    }

    public function create(Request $request) {
        $url = $request->get('url');

        $short = new URL();

        $alt = str_random(7);

        $short->create([
            'url' => $url,
            'short' => $alt,
        ]);

        return json_encode($alt);
    }
}
