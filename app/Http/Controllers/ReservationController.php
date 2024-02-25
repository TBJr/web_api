<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::paginate(20);
        return response()->json(['data'=>$reservations],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        try {
            
            $data = $request->validated();
            $reservation = Reservation::create($data);
            return response()->json(['data'=>$reservation,'message'=>'Reservación insertada con exito'],201);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        try {
            
            $reservation = Reservation::findOrfail(1);
            return response()->json(['data'=>$reservation,'message'=>'Resrvación insertada con exito'],201);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        try {
            
            $reservation = Reservation::findOrFail(1);
            $data = $request->validated();
            $reservation->update($data);
            return response()->json(['data'=>$reservation,'message'=>'Reservación actualizada con exito'],200);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        try {

            $reservation = Reservation::findOrFail(1);
            $reservation->delete(); 
            return response()->json(['message'=>'Reservación eliminada con exito'],200);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()],500); 
            
        }
    }
}
