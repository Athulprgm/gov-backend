<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Upload an image to public storage and return the URL.
     */
    public function upload(Request $request)
    {
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthorized access.'], 401);
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120', // Max 5MB
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            
            // Store in 'uploads' directory inside the 'public' storage disk
            $path = $file->store('uploads', 'public');
            
            // Return full URL to the public asset
            $url = asset('storage/' . $path);

            return response()->json([
                'url' => $url,
                'path' => $path,
            ], 200);
        }

        return response()->json(['message' => 'No file uploaded'], 400);
    }
}
