<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $continents = Continent::all();

        $list = [];

        if (request()->filled('continent_id')){
          $continent_id = request('continent_id');
          $list = Country::where('continent_id',$continent_id)->get();
        }

        return view('country.index',compact(['continents','list']));
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
        $new = new Country;
        $new->continent_id = request('continent_id');
        $new->name = request('name');
        $new->latlng = request('latlng');
        $new->save();

        return redirect()->back()->with([
            'message'=>'New country added',
            'error'=>false
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
//        $country = $country;
//        $new->continent_id = request('continent_id');
        $country->name = request('name');
        $country->latlng = request('latlng');
        $country->save();

        return redirect()->back()->with([
            'message'=>'Country Saved',
            'error'=>false
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
        $country->delete();

        return redirect()->back()->with([
            'message'=>'Country Removed',
            'error'=>false
        ]);

    }
}
