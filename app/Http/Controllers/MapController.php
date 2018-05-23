<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MapLoc;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$maps=MapLoc::all();
        //return view('index',compact('passports'));
        return view('admin.mapIndex',compact('maps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_map');
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
        $maps = new MapLoc();
        $maps->dormName=$request->get('dorm_name');
        $maps->long=$request->get('longitude');
        $maps->lat=$request->get('Latitude');
        $maps->save();
        return redirect('admin/map/create')->with('flash_message_success','Dormitory added');
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
        $maps = MapLoc::find($id);
        return view('admin.edit_map',compact('maps','id'));
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
        $maps= MapLoc::find($id);
        $maps->dormName=$request->get('dorm_name');
        $maps->long=$request->get('longitude');
        $maps->lat=$request->get('Latitude');
        $maps->save();
        return redirect('admin/map');
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
        $maps = MapLoc::find($id);
        $maps->delete();
        return redirect('admin/map')->with('success','Information has been  deleted');
    }
}
