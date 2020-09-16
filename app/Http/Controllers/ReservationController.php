<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Cars;
class ReservationController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $reservation = Reservation::orderBy('created_at','asc')->get();
       
            # code...
            
        return view('reservation.index')->with('reservations',$reservation);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('reservation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
                $this->validate($request,[
                    'fullname' => 'required',
                    'address' => 'required',
                    'contact' => 'required',
                    'date' => 'required',
                    'code' => 'required',
                    'days' => 'required'
                ]);

                // create reservation

                $reservation = new Reservation;
                $reservation->fullname = $request->input('fullname');
                $reservation->address = $request->input('address');
                $reservation->contact = $request->input('contact');
                $reservation->date = $request->input('date');
                $reservation->code = $request->input('code');
                $reservation->days = $request->input('days');
                $reservation->save();

                return redirect('cars')->with('success', 'Your reservation has been sent. We will reply you shortly');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $reservation = Reservation::find($id);
        $reservation->delete(); 

        return redirect('reservation')->with('success', 'Reservation Confirmed');
    }
}
