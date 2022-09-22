<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\User;
use Illuminate\Http\Request;

class Destinations extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $dests=Destination::paginate(8);
         //dd($users);
        return view('Admin.index',compact('dests'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('Admin.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'destination' => 'required',
            'fee' => 'required',
        ]);

        $dest = new Destination;
        $dest->destination_name = $request->destination;
        $dest->Fee_per_month = $request->fee;
        $dest->save();
        return redirect()->route('user.index')->with(['success' => 'Destination was Updated successfully']); 
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
        $dests=Destination::get()->find($id);
      // dd($dests);
        return view('Admin.edit',compact('dests'));

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
        //dd($request);
        $request->validate([
            'destination' => 'required',
            'fee' => 'required',
        ]);
        $dest=Destination::findOrFail($id);

        $dest->destination_name = $request->destination;
        $dest->Fee_per_month = $request->fee;
        //$dest->id=$request->id;
        $dest->save();
        return redirect()->route('user.index')->with(['success' => 'Destination was Updated successfully']); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $dests=Destination::get()->find($id)->delete();

        return redirect()->route('user.index')->with(['success' => 'Destination was deleted successfully']); 

    }
}
