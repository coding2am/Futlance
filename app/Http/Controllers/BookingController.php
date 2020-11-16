<?php

namespace App\Http\Controllers;

use App\booking;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.booking.index');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(booking $booking)
    {
        //
    }

    public function courtBooking()
    {
        return view('frontend.booking.index');
    }

    public function checkout()
    {
        return view('frontend.booking.checkout');
    }

    public function filterTime(Request $request)
    {
        $date = $request->date;
        $booking = Booking::where('booking_date', $date)->get();
        return $booking;
    }

    public function filterCheckDate(Request $request)
    {
        date_default_timezone_set('Asia/Yangon');
        $request_date = strtotime($request->date);
        $request_monthday = date('d', $request_date);

        $today = getdate(date('U'));
        $current_monthDay = $today['mday'];
        $current_weekDay = $today['wday'];

        if ($request_date > strtotime('+7 day')) {
            $message = "You can only booking within in 7days";
        } else if ($request_date < strtotime('-1 day')) {
            $message = "Your request date is in the past";
        } else {
            $message = '';
        }

        return $message;
    }
    public function filterCheckStartTime(Request $request)
    {
        date_default_timezone_set('Asia/Yangon');

        // dd($request)
        // $message = strtotime('now');
        // $minutes = ($end_time - $start_time) / 60;
        // $sections = floor($minutes / 60);
        $start_time = strtotime($request->from);
        $closeTime = strtotime(date("H:i",mktime(22,00)));
        if($start_time > $closeTime)
        {
            $message = "Sorry Booking are closed at 9:00pm";
        }
        else
        {
            $message = "";
        }
        return $message;
    }

    public function filterCheckEndTime(Request $request)
    {
        date_default_timezone_set('Asia/Yangon');

        // dd($request)
        // $message = strtotime('now');
        // $minutes = ($end_time - $start_time) / 60;
        // $sections = floor($minutes / 60);
        $end_time = strtotime($request->to);
        $closeTime = strtotime(date("H:i",mktime(22,00)));
        if($end_time > $closeTime)
        {
            $message = "Sorry Booking are closed at 9:00pm";
        }
        else
        {
            $message = "";
        }
        return $message;
    }
}
