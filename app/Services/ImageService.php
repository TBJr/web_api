<?php

namespace App\Services;

use App\Http\Requests\StoreImageRequest;
use App\Models\Image;

Class ImageService
{
    public function uploadImage($imageFile)
    {      
        $name = $imageFile->hashName(); // Generate a unique, random name...
        $extension = $imageFile->extension();
        $filename = $name . '.' . $extension;
        //$imageFile->move(public_path('images'), $filename);
        $path = $imageFile->storeAs('images', $filename);   
        return $path;
    }

    public function saveImage($path){
        $image = Image::create([
            'url' => $path,
        ]);

        return $image;

    }
}