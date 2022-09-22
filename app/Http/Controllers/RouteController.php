<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dests=Route::with('destination')->paginate(8);
        return view('Admin.Route.route',compact('dests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destname=Destination::all();
        return view('Admin.Route.create',compact('destname'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'route' => 'required',
            'destname' => 'required',
        ]);
        $dest = new Route;
        $dest->route_name = $request->route;
        $dest->destination_id = $request->destname;
        $dest->save();
        return redirect()->route('route.index')->with(['success' => 'Destination was Updated successfully']); 

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
        
        $dests=Route::where('id' , $id)->first();
       
        $destname=Destination::all();
    
        return view('Admin.Route.edit',compact('dests','destname'));
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
            'route' => 'required',
            'destname' => 'required',
        ]);
        $dest=Route::findOrFail($id);

        $dest->route_name = $request->route;
        $dest->destination_id = $request->destname;
        $dest->save();
        return redirect()->route('route.index')->with(['success' => 'Destination was Updated successfully']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dests=Route::get()->find($id)->delete();
        return redirect()->route('route.index')->with(['success' => 'Destination was deleted successfully']); 
    }
}
