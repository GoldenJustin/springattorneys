<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image; // Import the Image facade
use App\Models\Image as ImageModel; // Import the Image model

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        // Validate form inputs
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size 2MB
        ]);

        // Process image upload and resize
        $image = $request->file('image');
        $resizedImage = Image::make($image)->resize(null, 1024, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('jpg', 75); // Resize to fit within 1024x1024 pixels and convert to JPEG with 75% quality

        // Generate unique filename
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();

        // Store resized image
        $imagePath = 'images/' . $filename;
        Storage::disk('public')->put($imagePath, $resizedImage);

        // Store image metadata in the database
        ImageModel::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }
}
