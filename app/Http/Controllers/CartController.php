<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\NewOrder;
use Mail;
use App\User;
use App\Cart;

class CartController extends Controller
{
    public function update(Request $request)
    {
        $client = auth()->user(); 
        $cart = $client->cart;
        $cart->status = 'Pending';
        $cart->order_date = Carbon::now();
        $cart->save(); // Se actualiza

        $admins = User::where('admin', true)->get();
        Mail::to($admins)->send(new NewOrder($client, $cart));

        $request->session()->flash('success', 'Tú pedido se ha registrado correctamente, nos pondremos en contacto contigo vía email!');
        return back();
    }
}
