<?php

namespace App\Http\Controllers;

use App\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class URLController extends Controller
{
    public function redirect($url) {
        try {
            $link = URL::where('alt', $url)->first();
            return redirect($link->url);
        } catch (\Exception $e) {
            return json_encode([
                'error' => 'URL not found.'
            ]);
        }
    }

    /**
     * @param Request $request
     * @return string
     */
    public function create(Request $request) {
        $url = $request->get('url');

        $validator = Validator::make($request->all(), [
            'url' => 'url',
        ]);

        if ($validator->fails()) {
            return json_encode([
                'error' => 'NOPE',
            ]);
        }

//        $this->validate($request, [
//            'url' => 'url',
//        ]);

        $short = new URL();

        $alt = str_random(7);

        $short->create([
            'url' => $url,
            'alt' => $alt,
        ]);

        return json_encode([
            'url' => 'https://larahh.xyz/u/'.$alt,
        ]);
    }
}
