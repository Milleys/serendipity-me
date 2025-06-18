<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SerendipityController extends Controller
{
    //

    public function fetchActivity(Request $request)
        {
            $activityResponse = Http::get('https://bored-api.appbrewery.com/random');

            if ($activityResponse->successful()) {
                $activityData = $activityResponse->json();
                $activity = $activityData['activity'];

                // Get image from Pexels
                $pexelsResponse = Http::withHeaders([
                    'Authorization' => 'wZtv5TUs6lnxyHLPNyx5lqv8zS5qxaHjPWvwXkVeu14UOaaHk4WG2v0S'
                ])->get('https://api.pexels.com/v1/search', [
                    'query' => $activity,
                    'per_page' => 1,
                ]);

                $imageUrl = null;
                if ($pexelsResponse->successful() && count($pexelsResponse['photos']) > 0) {
                    $imageUrl = $pexelsResponse['photos'][0]['src']['medium']; // or 'original', 'large'
                }

                return back()->with([
                    'activityData' => $activityData,
                    'imageUrl' => $imageUrl,
                ]);
            }

            return back()->with('activityData', [
                'activity' => 'Could not fetch activity.',
                'type' => 'error',
            ]);
        }

}
