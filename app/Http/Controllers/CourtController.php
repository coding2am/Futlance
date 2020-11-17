<?php

namespace App\Http\Controllers;

use App\City;
use App\Court;
use App\Quarter;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courts = Court::all();
        return view('backend.court.index', compact('courts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $quarters = Quarter::all();
        return view('backend.court.create', compact('cities', 'quarters'));
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
        $request->validate([
            "name" => "required|min:2",
            "photo" => "required|mimes:jpeg,bmp,png,jpg", // a.jpg
            "price" => "required",
            "quarter" => "required"
        ]);

        // If include file, upload
        if ($request->file()) {
            $fileName = time() . '_' . $request->photo->getClientOriginalName();

            $filePath = $request->file('photo')->storeAs('court', $fileName, 'public');
            // $path = public_path('my_assets/images/courts/'.$fileName);
            // dd($path);
            $path = '/storage/' . $filePath;
            // $user_id = 1;
        }

        // store
        $court = new Court();
        $court->user_id = $request->user_id;
        $court->name = $request->name;
        $court->photo = $path;
        $court->price_per_hour = $request->price;
        $court->quarter_id = $request->quarter;
        $court->save();

        // redirect
        return redirect()->route('court.index')->with('success', 'Court has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function show(Court $court)
    {
        $cities = City::all();
        $quarters = Quarter::all();
        return view('backend.court.detail',compact('court','cities','quarters'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function edit(Court $court)
    {
        $cities = City::all();
        $quarters = Quarter::all();
        return view('backend.court.edit',compact('court','cities','quarters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Court $court)
    {
        $request->validate([
            "name" => "required|min:2",
            "photo" => "required|mimes:jpeg,bmp,png,jpg", // a.jpg
            "price" => "required",
            "quarter" => "required"
        ]);
        if ($request->file()) {
            unlink(public_path($request->oldphoto));
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('court', $fileName, 'public');
            $path = '/storage/' . $filePath;
        } else {
            $path = $request->oldphoto;
        }

        $court->user_id = $request->user_id;
        $court->name = $request->name;
        $court->photo = $path;
        $court->price_per_hour = $request->price;
        $court->quarter_id = $request->quarter;
        $court->save();

        return redirect()->route('court.index')->with('success', 'Your changes has been saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function destroy(Court $court)
    {
        $court->delete();
        unlink(public_path($court->photo));
        return redirect()->route('court.index')->with('success', 'Court has been deleted successfully!');
    }

    // Filter Function
    public function filterCity(Request $request)
    {
        $cid = $request->cid;
        $quarters = Quarter::where('city_id', $cid)->get();
        return $quarters;
    }
}
