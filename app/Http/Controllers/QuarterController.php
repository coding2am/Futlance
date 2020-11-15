<?php

namespace App\Http\Controllers;

use App\Quarter;
use Illuminate\Http\Request;
use App\City;

class QuarterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quarters = Quarter::all();
        return view('backend.quarter.index', compact('quarters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('backend.quarter.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        // Validation
        $request-> validate([
            "name" => "required|min:5",
        ]);

        // store
        $quarter = new Quarter;
        $quarter->name = $request->name;
        $quarter->city_id = $request->city;
        $quarter->save();

        // redirect
        return redirect()->route('quarter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function show(Quarter $quarter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function edit(Quarter $quarter)
    {
        $cities = City::all();
        return view('backend.quarter.edit', compact('quarter', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quarter $quarter)
    {
        // dd($request);

        // Validation
        $request-> validate([
            "name" => "required|min:5",
        ]);

        // store
        $quarter->name = $request->name;
        $quarter->city_id = $request->city;
        $quarter->save();

        // redirect
        return redirect()->route('quarter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quarter $quarter)
    {
        $quarter->delete('quarter');
        return redirect()->route('quarter.index');
    }
}
