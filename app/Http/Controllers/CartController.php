<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }


    public function index()
    {

        if(!Session::has('cart')){
            Session::set('cart', $this->cart, ['cart' => Session::get('cart')]);
        }

        return view('store.cart', ['cart' => Session::get('cart')]);
    }
}
