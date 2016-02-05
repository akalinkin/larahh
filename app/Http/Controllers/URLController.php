<?php

namespace App\Http\Controllers;

use App\URL;
use Illuminate\Http\Request;
use Validator;

class URLController extends Controller
{
    public function redirect($url) {
        try {
            $link = URL::where('alt', $url)->first();
            $link->increment('view_count');

            return redirect($link->url);
        } catch (\Exception $e) {
            return json_encode([
                'error' => 'URL not found.',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function create(Request $request) {
        $url = $request->get('url');

        $fails = $this->validate($request, [
            'url' => 'active_url|unique:urls|required',
        ]);

        if ($fails) {
            return response()->json([
                'errors' => $fails,
            ], 422);
        }

        $short = new URL();

        $alt = str_random(7);
        $count_alt = str_random(7);

        $short->create([
            'url' => $url,
            'alt' => $alt,
            'count_alt' => $count_alt
        ]);

        return response()->json([
            'url' => 'https://larahh.xyz/u/'.$alt,
            'counter' => 'https://larahh.xyz/c/'.$count_alt,
        ], 200);
    }
}
