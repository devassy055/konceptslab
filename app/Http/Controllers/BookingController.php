<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bus;
use App\Models\Destination;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userval= config('app.user');
        $userpasss=config('app.userpass');
        $adminval=config('app.admin');
        $adminpasss=config('app.adminpass');
        $user=Auth::user();
        if($user->name===$adminval)
        {
        $dests=Booking::with('bus')->paginate(8);
        //dd('dvsd');
        return view('Admin.Booking.booking',compact('dests'));
        }
        $busname=Bus::all();
        $routes=Route::All();
        $query = Destination::query();

        if($request->has('search')){
            $query->where('destination_name', 'LIKE', "{$request->search}%");
        }
        $dests= $query->paginate(8);

        return view('User.book',compact('dests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    public function create1()
    {
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $routes=Route::where('destination_id' , $id)->first();
        $bus=Bus::Where('route_id',$routes->id)->first();
        // $query = Booking::query();
        // $query->where('buesid', 'LIKE', "{$bus->id}%");
        $booking=Booking::Where('buesid',$bus->id)->get();
        
        $sumOfOffsets = $booking->sum('nooffsets');
        $value=($bus->available_seats)-($sumOfOffsets);
       return view('User.bookingfile');
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
    }

    public function destinationFilter(Request $request)
    {
        
    }
}
