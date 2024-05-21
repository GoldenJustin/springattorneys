<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image; 


class ImageController extends Controller
{
    protected $data =[];
    public function __construct()
    {
        $this->data['images']= Image::all();
    }

    public function index(){
        return view('auth/image', $this->data);
    }

    public function gallery(){
        return view('gallery');
    }
    public function create()
    {
        return view('auth/upload');
    }

    public function upload(Request $request)
    {
        $requestData = $request->all();
        $fileName = time().$request->file('filename')->getClientOriginalName();
        $path = $request->file('filename')->storeAs('images', $fileName, 'public');
        $requestData["filename"] = '/storage/'.$path;
        Image::create($requestData);
        return redirect('dashboard')->with('flash_message', 'Image Addedd!');
    }
}
