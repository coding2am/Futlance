<?php

namespace App\Http\Controllers;

use App\City;
use App\Court;
use App\Quarter;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $quarters = Quarter::all();
        $courts = Court::all();
        return view('frontend.homepage', compact('cities', 'quarters', 'courts'));
    }

    // Filter Function
    public function filterQuarter(Request $request)
    {
        $qid = $request->qid;
        $courts = Court::where('quarter_id',$qid)->get();
        return $courts;
    }
}
