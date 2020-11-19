<?php

namespace App\Http\Controllers;

use App\Booking;
use App\City;
use App\Court;
use App\Quarter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function profile ()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        return view('frontend.user.profile', compact('user'));
    }

    public function bookingHistory()
    {
        $user_id = Auth::user()->id;
        $bookings = Booking::where('user_id', $user_id)->get();
        return view('frontend.user.booking', compact('bookings'));
    }

    // All Courts
    public function court()
    {
        $cities = City::all();
        $quarters = Quarter::all();
        $courts = Court::all();
        return view('frontend.court.index', compact('cities', 'quarters', 'courts'));
    }
    // Court Detail
    public function courtDetail($id)
    {
        $court = Court::find($id);
        return view('frontend.court.detail', compact('court'));
    }

    public function blog()
    {
        return view('frontend.blog.index');
    }

    public function about()
    {
        return view('frontend.aboutpage');
    }


}
