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

            if (!$link) {
              return response()->json([
                  'error' => 'Specified URL was not found:' . $url
              ], 404);
            }

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

        $appBaseUrl = env('APP_URL','http://shortify.local');
        $appBaseUrl = rtrim($appBaseUrl, '/'); // remove last '/' if exists

        return response()->json([
            'url' => $appBaseUrl.'/u/'.$alt,
            'counter' => $appBaseUrl.'/c/'.$count_alt,
        ], 200);
    }
}
