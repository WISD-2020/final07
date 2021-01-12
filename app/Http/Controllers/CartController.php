<?php

namespace App\Http\Controllers;

use app\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =auth()->user();
        $carts =auth()->user()->cart()->get();

        return view('carts.index', compact('carts','users'));

        $userid=auth()->user()->id;



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
        if ($cart = $request->user()->cart()->where('room_id', $request->room_id)->first()) {
            $cart->update([
                'amount' => $cart->amount + $request->amount,
            ]);
        } else{
            Cart::create([
                'user_id'    => $request->user()->id,
                'room_id' => $request->room_id,
                'checkin' => $request->checkin,
                'checkout' => $request->checkout,
                'amount'     => $request->amount,
            ]);
        }

        return [];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $request->user()->cart()->where('room_id', $id)->delete();
        return [];
    }
}
