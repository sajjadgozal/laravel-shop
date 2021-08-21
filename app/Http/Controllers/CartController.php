<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Services\CartHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class CartController extends Controller
{

    function show(Cart $cart){

        $cart = CartHandler::getCart();

        return Inertia::render('Cart' , ['cart'=> $cart]);

    }

    function addToCart(Request $request , Product $product): \Illuminate\Http\JsonResponse
    {

        $cart = CartHandler::getCart();

        CartHandler::add($cart,$product);

        return response()->json([
            'massage' => 'added to cart'
        ],200);

    }

    function increaseInCart(Request $request , Product $product): \Illuminate\Http\RedirectResponse
    {

        $cart = CartHandler::getCart();

        CartHandler::add($cart,$product);

        return Redirect::route('cart');

    }

    function decreaseFromCart(Product $product) {

        $cart = CartHandler::getCart();

        CartHandler::decrease($cart,$product);

        return Redirect::route('cart');

    }

    function removeFromCart(Product $product) {

        $cart = CartHandler::getCart();

        CartHandler::remove($cart,$product);

        return Redirect::route('cart');
    }
}
