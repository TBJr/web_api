<?php

namespace App\Http\Controllers;

use App\Models\Excursion;
use App\Models\Image;
use App\Http\Requests\StoreExcursionRequest;
use App\Http\Requests\UpdateExcursionRequest;
use App\Http\Resources\ExcursionCollection;
use App\Http\Resources\ExcursionResource;
use App\Http\Resources\ReservationCollection;
use App\Http\Resources\OpinionCollection;
use App\Services\ImageService;
use Exception;

class ExcursionController extends Controller
{

    function __construct( 
       protected ImageService $imageService){}
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ExcursionCollection(Excursion::paginate());
        //return response()->json(['data'=>$excursions],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExcursionRequest $request)
    {

        try {
            
            $data = $request->safe()->except(['places,images']);
            $dataPlaces = $request->safe()->only(['places']);
            //$dataImages = $request->safe()->only(['images']);
          
           
            $excursion = Excursion::create($data);

            $excursion->places()->sync($dataPlaces);

            if ($request->file('images')->isValid()){

                foreach ($request->file('images') as $imagefile) {
                    $path = $this->imageService->uploadImage($imagefile);
                    $image = $this->imageService->saveImage($path);
                    $excursion->images()->save($image);
                }

            }            

            return response()->json(['data'=> new ExcursionResource($excursion),'message'=>'Excursion insertada con exito'],201);    

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 

        }


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       try {
            
            $excursion =new ExcursionResource(Excursion::findOrfail($id));        
            return response()->json(['data'=>$excursion],200);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExcursionRequest $request, $id)
    {

        try {
            
            $excursion = Excursion::findOrFail($id);
            $data = $request->validated();
            $excursion->update($data);
            return response()->json(['data'=>new ExcursionResource($excursion),'message'=>'Excursion actualizada con exito'],200);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
       

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $excursion = Excursion::findOrFail($id);
            $excursion->delete(); 
            return response()->json(['message'=>'Excursion eliminada con exito'],200);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
    }
    public function getReservationsByExcursion($id)
    {
        try {

            $excursion= Excursion::findOrFail($id);
            $reservations = new ReservationCollection($excursion->reservations);
            return new ReservationCollection($reservations);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }

       
        
    }

    public function getOpinionsByExcursion($id){

        try {

            $excursion= Excursion::findOrFail($id);
            $opinions = $excursion->opinions;           
            return new OpinionCollection($opinions); 

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }

       
    }
}
