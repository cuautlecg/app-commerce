<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(Request $request)
    {
        $cart = auth()->user()->cart;
        $cart->status = 'Pending';
        $cart->save(); // Se actualiza

        $request->session()->flash('success', 'Tú pedido se ha registrado correctamente, nos pondremos en contacto contigo vía email!');
        return back();
    }
}
