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

                // Get image from Pixabay
                $pixabayResponse = Http::get('https://pixabay.com/api/', [
                    'key' => '50924618-29a39a9600a657ed5fe9dc9db', // Replace with your actual API key
                    'q' => $activity,
                    'image_type' => 'illustration',
                    'safesearch' => 'true',
                    'per_page' => 5,
                    'page' => 1,
                ]);

                $imageUrl = null;
                if ($pixabayResponse->successful() && count($pixabayResponse['hits']) > 0) {
                    $imageUrl = $pixabayResponse['hits'][0]['largeImageURL']; // or 'previewURL' for smaller version
                }
                if (!$pixabayResponse->successful()) {
                    dd($pixabayResponse->status(), $pixabayResponse->body());
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

            return redirect()->back()->with('success', 'Serendipity updated successfully!');
        } 
        
       

        public function show()
        {
            $user = Auth::user();
            $current = $user->serendipities()
                        ->whereNull('completed_at')
                        ->latest()
                        ->first(); // Most recent serendipity

            $past = $user->serendipities()
                        ->whereNotNull('completed_at')
                        ->orderBy('created_at', 'desc')
                        ->skip(0)
                        ->take(10)
                        ->get();
 // Past serendipities

            return view('profile', [
                'currentSerendipity' => $current,
                'pastSerendipities' => $past,
            ]);
        }




        public function update(Request $request, $id)
            {
                $request->validate([
                    'rating' => 'nullable|numeric|min:0|max:5',
                    'comment' => 'nullable|string',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    // Add any other fields you want to update
                ]);

                $serendipity = Serendipity::where('id', $id)
                    ->where('user_id', auth()->id()) // Ensure user owns the serendipity
                    ->firstOrFail();

                // Handle image upload
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                
                    // Save to public/images/uploads (NOT storage)
                    $destinationPath = public_path('images/uploads');
                    $image->move($destinationPath, $filename);
                
                    // Save relative path to DB
                    $serendipity->image_path = 'images/uploads/' . $filename;
                }
                    

                // Update other fields
                $serendipity->completed_at = now();
                $serendipity->rating = $request->input('rating');
                $serendipity->comment = $request->input('comment');
                $serendipity->save();

                return redirect()->back()->with('success', 'Serendipity updated successfully!');
            }

        
        

}
