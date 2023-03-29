<?php

namespace App\Http\Controllers\Api\News;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userId = $request->user()->id;

        $user = User::where('id', '=', $userId)->with('userPreference')->first();
        $apiKey = $user->userPreference->newsSource->api_key;
        $url = $user->userPreference->newsSource->url;

        $response = Http::get($url . '/v2/top-headlines', [
            'country' => 'us',
            'category' => $request->category,
            'q' => $request->keyWord,
            'apiKey' => $apiKey,
        ]);

        return $response->json();
    }
}
