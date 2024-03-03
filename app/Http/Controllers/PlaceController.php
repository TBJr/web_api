<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Http\Resources\PlaceCollection;
use App\Services\ImageService;
use Exception;

class PlaceController extends Controller
{
    function __construct( 
        protected ImageService $imageService){}
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return new PlaceCollection(Place::paginate());
       // return response()->json(['data'=>$places,'statusCode'=>200],200);
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlaceRequest $request)
    {
        try {

            $data = $request->validated()->except(['images']);
            $images =  $request->validated()->only(['images']);
            $place = Place::create($data);

            if ($images->hasFile('images')){

                foreach ($images->file('images') as $imagefile) {
                    $ruta = $this->imageService->uploadImage($imagefile);
                    $image = $this->imageService->saveImage($ruta);
                    $place->images()->save($image);
                }

            }
            return response()->json(['data'=>$place,'message'=>'Lugar insertado con exito','statusCode'=>201],201);

        } catch (Exception $e) {

            return response()->json(['error'=>$e->getMessage()],500);
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {

            $place = Place::findOrFail($id);  
            return response()->json(['data'=>$place,'statusCode'=>200],200);

        } catch (Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlaceRequest $request, $id)
    {
        try {

            $place = Place::findOrFail($id);  
            $data = $request->validated();
            $place->update($data);

            return response()->json(['data'=>$place,'message'=>'El Lugar ha sido actualizado con exito','statusCode'=>200],200);

        } catch (Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $place = Place::findOrFail($id);  
            $place->delete();
            return response()->json(['message'=>'El Lugar ha sido eliminado con exito','statusCode'=>200],200);
        } catch (Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
}
