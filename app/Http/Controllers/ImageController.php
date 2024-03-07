<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Models\Image;
use App\Services\ImageService;
use Exception;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    
    function __construct(
        protected ImageService $imageService,
    ){}
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();
        return response()->json(['data'=>$images],200);
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {

        try {

            // $this->validate($request, [
            //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // ]);

          //  $requestValidated = $request->validated();

            //aca llamaria al servicio con $requestValidated->file('image')

            if(  $request->file('image')->isValid() ){

                $ruta = $this->imageService->uploadImage($request->file('image'));
                $image = $this->imageService->saveImage($ruta);  
           
    
                return response()->json(['message'=>'Imagen insertada con exito'],200);

            }
    
            
            
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

        

       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $image = Image::findOrFail($id);           
            return response()->json(['data' => $image], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $image = Image::findOrFail($id);
            Storage::disk('public')->delete($image->ruta);        
            $image->delete();
            return response()->json(['message' => 'Imagen eliminada con exito'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        

    }
}
