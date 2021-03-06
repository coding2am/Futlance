<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Court;
use App\PaymentMethod;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('backend.booking.index',compact('bookings'));
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
        // dd($request);
        
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

    public function courtBooking($id)
    {
        $point = 0;
        if(Auth::user())
        {
            $current_user_id = Auth::user()->id;
            $counts = DB::select("SELECT count FROM court_user WHERE user_id =".$current_user_id." AND court_id =". $id);
            // $counts = DB::table('court_user')->where('user_id',$current_user_id)->get('count');
            foreach($counts as $count)
            {
                $point += (intval($count->count)) * 1000;
            }
        }

        $court = Court::find($id);
        $paymentMethods = PaymentMethod::all();
        return view('frontend.booking.index', compact('court','paymentMethods','point'));
    }

    public function checkout()
    {
        return view('frontend.booking.checkout');
    }

    // taken booking section display function
    public function filterTime(Request $request)
    {
        $date = $request->date;
        $court_id = $request->court_id;
        $booking = Booking::where([
            ['court_id','=',$court_id],
            ['booking_date','=',$date],
        ])->get();
        return $booking;
    }

    // date check function
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
    // start time check function
    public function filterCheckStartTime(Request $request)
    {
        date_default_timezone_set('Asia/Yangon');

        $start_time = strtotime($request->from);
        $closeTime = strtotime(date("H:i",mktime(21,00)));
        $openTime = strtotime(date("H:i",mktime(6,00)));

        if($start_time > $openTime || $start_time == $openTime)
        {
           if($start_time > $closeTime || $start_time == $closeTime)
           {
            $message = "Sorry Booking are closed at 9:00 pm";
            }
            else
            {
                $message = "";
            }
        } 
        else
        {
            $message = "Sorry Booking are open at 6:00 am";
        }
        return $message;
    }

    // end time check function
    public function filterCheckEndTime(Request $request)
    {
        date_default_timezone_set('Asia/Yangon');

        // dd($request)
        // $message = strtotime('now');
        // $minutes = ($end_time - $start_time) / 60;
        // $sections = floor($minutes / 60);
        $end_time = strtotime($request->to);
        $closeTime = strtotime(date("H:i",mktime(21,00)));

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

    // store Booking function
    public function storeBooking(Request $request)
    {
        //validate
        $request->validate([
            "date" => "required",
            "start_time" => "required",
            "end_time" => "required",
            "paymentMethod" => "required",
        ]);
        
        date_default_timezone_set('Asia/Yangon');

        //SELECTING USER REQUEST DATE & TIME
        $request_date = strtotime($request->date); 
        $request_start_time = strtotime($request->start_time);
        $request_end_time =  strtotime($request->end_time);
        $totalAmount = $request->total;

        //COURT CLOSE & OPEN TIME
        $court_close_time = strtotime(date("H:i",mktime(21,00)));
        $court_open_time = strtotime(date("H:i",mktime(6,00)));

        if ($request_date > strtotime('+7 day')) 
        {
            //CHECKING REQUEST DATE IS OVER 7 DAYS ?
            return redirect()->route('court_booking',$request->court_id)->with('error','You can only booking within in 7days');
        } 
        else if ($request_date < strtotime('-1 day')) 
        {
            //CHECKING REQUEST DATE IS A PREVIOUS DATE ?
            return redirect()->route('court_booking',$request->court_id)->with('error','Your request date is in the past');
        } 
        else 
        {
            //SUCCESS DATE VALIDATION AND START CHECKING TIME !
            if($request_start_time > $court_open_time || $request_start_time == $court_open_time)
            {
               if($request_start_time > $court_close_time || $request_start_time == $court_close_time)
               {
                //OVER COURT CLOSED TIME CHECKING
                return redirect()->route('court_booking',$request->court_id)->with('error','Sorry Booking are closed at 9:00 pm');
                }
                else
                {
                    //SUCCESS START TIME VALIDATION AND START, END TIME VALIDATION !
                    if($request_end_time > $court_close_time)
                    {
                        return redirect()->route('court_booking',$request->court_id)->with('error','Sorry Booking are closed at 9:00 pm');
                    }
                    else
                    {
                        //SUCCESS END TIME VALIDATION AND START, INSERTING BOOKING !
                        $count = $request->section;
                        $bookingno = 'BOK-'.time();
                        $booking = new Booking();
                        $booking->booking_no = $bookingno;
                        $booking->booking_date = $request->date;
                        $booking->start_time = $request->start_time;
                        $booking->end_time = $request->end_time;
                        $booking->note = $request->note;
                        $booking->total_amount = $totalAmount;
                        $booking->user_id = $request->user_id;
                        $booking->court_id = $request->court_id;
                        $booking->payment_method_id = $request->paymentMethod;

                        $booking->save();
                        $booking_id = $booking->id;

                        DB::table('court_user')->insert([
                            'user_id'=>$request->user_id,
                            'court_id'=>$request->court_id,
                            'count'=>$count,
                        ]);
                        return redirect()->route('booking.success',compact('booking_id'));
                    }
                }
            } 
            else
            {
                //BEFORE COURT OPEN TIME CHECKING
                return redirect()->route('court_booking',$request->court_id)->with('error','Sorry Booking were open at 6:00 am');
                
            }
        }
    }

    public function success (Request $request)
    {
        $booking_id = $request->booking_id;
        $booking = Booking::find($booking_id);
        return view('frontend.booking.success',compact('booking'));
    }

    public function viewInvoice ($id)
    {
        $booking = Booking::find($id);
        return view('frontend.booking.invoice',compact('booking'));
    }

}
