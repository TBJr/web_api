<?php

namespace App\Services;

use App\Http\Requests\StoreImageRequest;
use App\Models\Image;

Class ImageService
{
    public function uploadImage($imageFile)
    {       
        $path = $imageFile->store('images', 'public');   
        return $path;
    }

    public function saveImage($path){
        $image = Image::create([
            'ruta' => $path,
        ]);

        return $image;

    }
}