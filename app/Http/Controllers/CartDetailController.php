<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {
        $cartDetail = new CartDetail();
        $cartDetail->cart_id = auth()->user()->cart->id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();

        $request->session()->flash('success', 'Se agrego correctamente el producto a tú carrito!');
        return redirect('/home');
    }

    public function destroy(Request $request)
    {

        $cartDetail = CartDetail::find($request->cart_detail_id);

        if(!is_null($cartDetail) && $cartDetail->cart_id === auth()->user()->cart->id){
            $cartDetail->delete();
            $request->session()->flash('success', 'Se elimino correctamente el producto de tú carrito!');
        }else{
            $request->session()->flash('error', 'Hubo un error al eliminar el producto de tú carrito!');
        }
        
        
        return back();
    }
}
