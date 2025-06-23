<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Serendipity;
use Illuminate\Support\Facades\Auth;

class SerendipityController extends Controller
{
    //

    public function fetchActivity(Request $request)
        {
                $jsonPath = public_path('storage/activities.json');
                $jsonContent = file_get_contents($jsonPath);
                $activitiesArray = json_decode($jsonContent, true);

                if (!$activitiesArray || !is_array($activitiesArray)) {
                    return back()->with('activityData', [
                        'activity' => 'Invalid or empty JSON structure.',
                        'type' => 'error',
                    ]);
                }

                // Pick a random activity
                $activityData = $activitiesArray[array_rand($activitiesArray)];

                $activity = $activityData['activity'];
                $description = $activityData['description'];
                $for_couples = $activityData['for_couples'];

                // Get image from Pexels
                $pexelsResponse = Http::withHeaders([
                    'Authorization' => 'wZtv5TUs6lnxyHLPNyx5lqv8zS5qxaHjPWvwXkVeu14UOaaHk4WG2v0S'
                ])->get('https://api.pexels.com/v1/search', [
                    'query' => $activity,
                    'per_page' => 1,
                ]);

                $imageUrl = null;
                if ($pexelsResponse->successful() && count($pexelsResponse['photos']) > 0) {
                    $imageUrl = $pexelsResponse['photos'][0]['src']['large']; // or 'original', 'large'
                }

                return back()->with([
                    'activityData' => $activityData,
                    'imageUrl' => $imageUrl,
                    'description' => $description,
                ]);
            }

            
         
        public function save(Request $request)
        {
            $validated = $request->validate([
                'activity' => 'required|string|max:255',
                'imgurl' => 'nullable|url',
                'description' => 'nullable|string',
            ]);

            Serendipity::create([
                'user_id' => Auth::id(),
                'activity' => $validated['activity'],
                'imgurl' => $validated['imgurl'] ?? null,
                'description' => $validated['description'] ?? null,
            ]);

            return back()->with('success', 'Serendipity saved successfully!');
        }   
        

}
