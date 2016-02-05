<?php

namespace App\Http\Controllers;

use App\URL;
use Illuminate\Http\Request;

class URLController extends Controller
{
    public function redirect($url) {
        try {
            $link = URL::where('alt', $url)->first();
            return redirect($link->url);
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
            'alt' => $alt,
        ]);

        return json_encode('https://larahh.xyz/u/'.$alt);
    }
}
