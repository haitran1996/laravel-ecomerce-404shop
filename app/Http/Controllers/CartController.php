<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Contracts\Controller\CartControllerInterface;
use Illuminate\Http\Request;

class CartController extends Controller implements  CartControllerInterface
{
    public function index(Request $request)
    {
        dd($a = 1 + 1 == 2);
        $cart = new Cart(session()->get('cart'));

        return view('shop.shop-cart',compact('cart'))
            ->with(['cs' => $request->cs, "cupon" => $request->cupon]);
    }

    public function add(Request $request, $idProduct)
    {
        $cart = new Cart(session()->get('cart'));
        $quantity = $request->input('quantity');

        if($request->ajax()) {
            $cart->add($quantity, $idProduct);
            session()->put('cart', $cart);
//
//            session()->flash("message", "Created new product successful!");
//            session()->flash("alert-type", "success");

            $notification = array([
               "message" => "Created new product successful!",
               "alert-type" => "success"
            ]);

            return response()->json($notification);
        };
    }

    public function update(Request $request)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->update($request);
        session()->put('cart', $cart);

        return view('shop/shop-cart')
            ->with(['cart'=> session()->get('cart'),
                'cs' => $request->cs, 'cupon' => $request->cupon]);
    }

    public function delete($id)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->delete($id);

        return back()->with(compact('cart'));
    }

    public function clear()
    {
        dd('a');
        session()->forget('cart');
        dd(session('cart'));
    }
}
