<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('backend.payment_method.index', compact('paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.payment_method.create');
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
            "name" => "required|min:5",
        ]);

        // store
        $paymentMethod = new PaymentMethod();
        $paymentMethod->name = $request->name;
        $paymentMethod->save();

        // redirect
        return redirect()->route('payment_method.index')->with('success', 'Payment has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        return view('backend.payment_method.edit', compact('paymentMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        // dd($request);

        // Validation
        $request->validate([
            "name" => "required|min:5",
        ]);

        // store
        $paymentMethod->name = $request->name;
        $paymentMethod->save();

        // redirect
        return redirect()->route('payment_method.index')->with('success', 'Your changes has been saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete('paymentMethod');
        return redirect()->route('payment_method.index');
    }
}
