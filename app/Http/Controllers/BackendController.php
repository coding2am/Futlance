<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Court;
use App\Booking;

class BackendController extends Controller
{
    public function index ()
    {
        $courts = Court::all();
        $users = User::all();
        $fiveUsers = User::all()->random(5);
        $fiveCourts = Court::all()->random(5);
        $bookings = Booking::all();
        return view('backend.index',compact('users','courts','bookings','fiveUsers','fiveCourts'));
    }
    public function owner ()
    {
        return view('backend.index');
    }
}
