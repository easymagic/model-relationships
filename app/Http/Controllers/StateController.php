<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $continent_id = null;
        $country_id = null;

        if (request()->filled('continent_id')){
            $continent_id = request('continent_id');
        }

        if (request()->filled('country_id')){
            $country_id = request('country_id');
        }

        $list = [];

        $continents = Continent::all();
        $countries = [];

        if (request()->filled('continent_id')){
            $countries = Country::where('continent_id',$continent_id)->get();
        }

        if (!is_null($continent_id) && !is_null($country_id)){

            //where('continent_id',$continent_id)->
            $list = State::where('country_id',$country_id)->get();

        }

        return view('state.index',compact(['list','countries','continents']));

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
        $new = new State;

        $new->country_id = request('country_id');
        $new->name = request('name');
        $new->latlng = request('latlng');

        $new->save();

        return redirect()->back()->with([
            'message'=>'New state added',
            'error'=>false
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        //
//        $new = new State;

        $state->name = request('name');
        $state->latlng = request('latlng');

        $state->save();

        return redirect()->back()->with([
            'message'=>'State saved',
            'error'=>false
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
        $state->delete();
        return redirect()->back()->with([
            'message'=>'State removed',
            'error'=>false
        ]);

    }
}
