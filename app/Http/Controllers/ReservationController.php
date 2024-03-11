<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Http\Resources\ReservationCollection;
use App\Http\Resources\ReservationResource;
use Exception;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ReservationCollection(Reservation::paginate());
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        try {

            $data = $request->validated();
            $reservation = Reservation::create($data);
            return response()->json(['data'=> new ReservationResource($reservation),'message'=>'Reservación insertada con exito'],201);

        } catch (Exception $e) {

            return response()->json(['error'=>$e->getMessage()],500);
        }
<<<<<<< HEAD

=======
        
>>>>>>> d67fe0a3c2469b5d59acf486414eb9fd2346953a
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

<<<<<<< HEAD
        try {
=======
        try { 
>>>>>>> d67fe0a3c2469b5d59acf486414eb9fd2346953a

            $reservation = Reservation::findOrFail($id);
            return response()->json(['data'=> new ReservationResource($reservation)],200);

        } catch (Exception $e) {

            return response()->json(['error'=>$e->getMessage()],500);
        }


    }

<<<<<<< HEAD

=======
   
>>>>>>> d67fe0a3c2469b5d59acf486414eb9fd2346953a

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, $id)
    {
        try {
            $data=$request->validated();
            $reservation = Reservation::findOrFail($id);
            $reservation->update($data);
            return response()->json(['data'=> new ReservationResource($reservation),'message'=>'Reservación actualizada con exito'],200);

        } catch (Exception $e) {

            return response()->json(['error'=>$e->getMessage()],500);
        }
<<<<<<< HEAD

=======
       
>>>>>>> d67fe0a3c2469b5d59acf486414eb9fd2346953a
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
<<<<<<< HEAD

=======
           
>>>>>>> d67fe0a3c2469b5d59acf486414eb9fd2346953a
            $reservation = Reservation::findOrFail($id);
            $reservation->delete();
            return response()->json(['message'=>'Reservación eliminada con exito'],200);

        } catch (Exception $e) {

            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
}
