<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Booking;
use App\City;
use App\Court;
use App\Quarter;

class OwnerController extends Controller
{
    public function index()
    {
        $owner_id = Auth::user()->id;
        $owner = User::find($owner_id);
        return view('frontend.owner.dashboard', compact('owner'));
    }

    public function booking()
    {
        $owner_id = Auth::user()->id;
        $owner = User::find($owner_id);
        $bookings = Booking::all();

        //courts data who posses owner
        $own_courts = Court::where('user_id',$owner_id)->get('id');
        $own_court_id = [];

        foreach($own_courts as $own_court)
        {
            array_push($own_court_id,$own_court->id);
        }
        $ownBookings = Booking::whereIn('court_id',$own_court_id)->get();
        // dd($ownBookings[0]->status);
        $pending_bookings = $ownBookings->where('status',0);
        // dd($pending_bookings);
        $confirmed_bookings = $ownBookings->where('status',1);
        return view('frontend.owner.booking', compact('pending_bookings','confirmed_bookings','owner'));
    }

    public function bookingDetail($id)
    {
        $owner_id = Auth::user()->id;
        $owner = User::find($owner_id);
        $booking = Booking::find($id);

        return view('frontend.owner.booking_detail', compact('booking','owner'));
    }

    public function bookingConfirm($id)
    {
        $booking = Booking::find($id);
        $booking->status = 1;
        $booking->save();
        return redirect()->back();
    }

    public function court()
    {
        $owner_id = Auth::user()->id;
        $owner = User::find($owner_id);
        $courts = Court::where('user_id',$owner_id)->get();;
        return view('frontend.owner.court', compact('owner','courts'));
    }
    public function courtEdit($id)
    {
        $owner_id = Auth::user()->id;
        $owner = User::find($owner_id);
        $court = Court::find($id);
        $cities = City::all();
        $quarters = Quarter::all();
        return view('frontend.owner.court_edit',compact('court','owner','cities','quarters'));
    }
    
    public function courtUpdate(Request $request, $id)
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

        $court = Court::find($id);
        $court->user_id = $request->user_id;
        $court->name = $request->name;
        $court->photo = $path;
        $court->price_per_hour = $request->price;
        $court->quarter_id = $request->quarter;
        $court->save();

        return redirect()->route('owner.court')->with('success', 'Your changes has been saved');

    }

    public function courtCreate()
    {
        $owner_id = Auth::user()->id;
        $owner = User::find($owner_id);
        $cities = City::all();
        $quarters = Quarter::all();
        return view('frontend.owner.court_create',compact('owner','cities','quarters'));
    }
    
    public function courtStore(Request $request)
    {
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
        return redirect()->route('owner.court')->with('success', 'Court has been added successfully!');
    }
}
