<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->data['images'] = Image::all();
    }

    public function index()
    {
        return view('auth.image', $this->data);
    }

    public function gallery()
    {
        $images = Image::all();
        return view('gallery', compact('images'));
    }

    public function create()
    {
        return view('auth.upload');
    }

   
    public function upload(Request $request)
{
    $request->validate([
        'filename' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
    ]);

    $requestData = $request->all();
    $fileName = time() . '.' . $request->file('filename')->getClientOriginalExtension();
    $path = $request->file('filename')->storeAs('images', $fileName, 'public');
    $requestData["filename"] = '/storage/' . $path;
    Image::create($requestData);

    return redirect()->route('dashboard')->with('flash_message', 'Image added successfully!');
}
public function destroy($id)
{
    $image = Image::findOrFail($id);
    
    // Delete the file from storage
    if (file_exists(public_path($image->filename))) {
        unlink(public_path($image->filename));
    }
    
    // Delete the record from the database
    $image->delete();

    return redirect()->route('dashboard')->with('success', 'Image deleted successfully!');
}


}
