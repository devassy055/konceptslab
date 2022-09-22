<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Route;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dests=Bus::with('routes')->paginate(8);
       // dd($dests);
        return view('Admin.Bus.route',compact('dests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destname=Route::all();

        return view('Admin.Bus.create',compact('destname'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bus' => 'required',
            'numberse' => 'required',
            'destname'=>'required',
        ]);
        $dest = new Bus();
        $dest->name = $request->bus;
        $dest->route_id=$request->destname;
        $dest->available_seats = $request->numberse;
        $dest->save();
        return redirect()->route('bus.index')->with(['success' => 'Destination was Updated successfully']); 
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
        $dests=Bus::where('id' , $id)->first();
        // echo '<pre>';
        // print_r($dests);
        // exit;
        $destname=Route::all();
     // dd($destname);
        return view('Admin.Bus.edit',compact('dests','destname'));
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
        $request->validate([
            'bus' => 'required',
            'numberse' => 'required',
            'destname'=>'required',
        ]);
        $dest=Bus::where('id' , $id)->first();

        $dest->name = $request->bus;
        $dest->route_id=$request->destname;
        $dest->available_seats = $request->numberse;
        $dest->save();
        return redirect()->route('bus.index')->with(['success' => 'Destination was Updated successfully']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dests=Bus::get()->find($id)->delete();
        return redirect()->route('bus.index')->with(['success' => 'Destination was deleted successfully']); 
    }
}
