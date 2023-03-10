<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Dtos\Cart\CartDto;
use App\Dtos\Cart\CartItemDto;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        dd(Session::get('cart', new CartDto()));
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function store(Product $product): JsonResponse
    {
        $cart = Session::get('cart', new CartDto());
        $items = $cart->getItems();
        if(Arr::exists($items, $product->id)) {
            $items[$product->id]->incrementQuantity();
        } else {
            $cartItemDto = $this->getCartItemDto($product);
            $items[$product->id] = $cartItemDto;
        }
        $cart->setItems($items);
        $cart->incrementTotalQuantity();
        $cart->incrementTotalSum($product->price);

        Session::put('cart', $cart);
        return response()->json([
            'status' => 'success'
        ]);
    }
}