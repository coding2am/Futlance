<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index()
    {
        $owner_id = Auth::user()->id;
        $owner = User::find($owner_id);
        return view('frontend.owner.dashboard', compact('owner'));
    }
}
