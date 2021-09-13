<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartHandler
{

    public static function getCart() {

        $oldCart = Cart::where('session_id', session()->getId())->with('products')->first();

        if (auth()->check() ) {

            $cart = Cart::where('user_id', auth()->id())->with('products')->first();

            if (!$cart) {
                $cart = Cart::create([
                    'user_id' => auth()->id()
                ]);
            }

            if ($oldCart) {
                // merge them
            }

        } else {
            $cart = $oldCart;
        }


        if (!$cart) {
            $cart = Cart::create([
                'session_id' => Session::getId()
            ]);
        }

        return $cart;

    }

    public static function add($cart , $product)
    {

        if ( $cart->products->contains($product) ) {

            $pivotItem = $cart->products()->where('product_id', $product->id)->firstOrFail()->pivot;

            $cart->products()->updateExistingPivot($product ,
                [
                    'quantity'=> $pivotItem->quantity + 1,
                    'price'=>$pivotItem->price
                ]);

        }else{

            $cart->products()->attach($product->id , ['price' => $product->price]);

        }

        $cart->totalQuantity += 1;

        $cart->totalPrice += $product->price;

        $cart->save();

    }


    public static function decrease($cart , $product)
    {
        $pivotItem = $cart->products()->where('product_id', $product->id)->firstOrFail()->pivot;

        if ( $pivotItem->quantity > 1  ) {

            $cart->products()->updateExistingPivot($product ,
                [
                    'quantity'=> $pivotItem->quantity - 1,
                    'price'=>$pivotItem->price
                ]);

        }else {

            $cart->products()->detach($product->id);

        }

        $cart->totalQuantity -= 1;

        $cart->totalPrice -= $product->price;

        $cart->save();
    }

    public static function remove($cart , $product)
    {
        $pivotItem = $cart->products()->where('product_id', $product->id)->firstOrFail()->pivot;

        $cart->totalQuantity -= $pivotItem->quantity ;

        $cart->totalPrice -= $pivotItem->quantity * $pivotItem->price ;

        $cart->products()->detach($product->id);

        $cart->save();
    }

}
