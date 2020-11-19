<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Court;
use App\Booking;
use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    public function index ()
    {
        $courts = Court::all();
        $users = User::all();
        $fiveUsers = DB::table('users')->limit(5)->get();
        $fiveCourts =  DB::table('courts')->limit(5)->get();
        $bookings = Booking::all();
        return view('backend.index',compact('users','courts','bookings','fiveUsers','fiveCourts'));
    }
    public function owner ()
    {
        return view('backend.index');
    }
}
