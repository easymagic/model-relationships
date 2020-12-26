<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use Illuminate\Http\Request;

class ContinentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Continent::all();
        return view('continent.index',compact(['list']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $continentObj = new Continent;
        $continentObj->name = request('name');
        $continentObj->latlng = request('latlng');
        $continentObj->save();

        return redirect()->back()->with([
            'message'=>'New continent added.',
            'error'=>false
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Continent  $continent
     * @return \Illuminate\Http\Response
     */
    public function show(Continent $continent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Continent  $continent
     * @return \Illuminate\Http\Response
     */
    public function edit(Continent $continent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Continent  $continent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Continent $continent)
    {
        //
        $continentObj = $continent;
        $continentObj->name = request('name');
        $continentObj->latlng = request('latlng');
        $continentObj->save();

        return redirect()->back()->with([
            'message'=>'Continent saved.',
            'error'=>false
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Continent  $continent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Continent $continent)
    {
        //
        $continent->delete();

        return redirect()->back()->with([
            'message'=>'Continent removed',
            'error'=>false
        ]);

    }

}
