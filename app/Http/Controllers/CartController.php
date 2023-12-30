<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function item_add(Request $request, Item $item)
    {
        $this->validate($request, [
            'inputQuantity' => 'nullable|numeric|min:1',
        ]);
        if ($request->inputQuantity != null) {
            $quantity = $request->inputQuantity;
        } else {
            $quantity = 1;
        }
        $cart = session()->get('cart', []);
        $sum_price = session()->get('sum_price', 0);
        if (isset($cart[$item->id])){
            $cart[$item->id]['quantity'] += $quantity;
            $cart[$item->id]['fullPrice'] = $cart[$item->id]['quantity'] * $item->price;

        } else {
            $cart[$item->id] = [
                'name' => $item->name,
                'price' => $item->price,
                'picture' => $item->picture,
                'quantity' => $quantity,
                'fullPrice' => $item->price * $quantity,
            ];
        }
        $sum_price += $item->price * $quantity;
        session()->put('cart', $cart);
        session()->put('sum_price', $sum_price);
        return redirect()->back()->with('success', 'Položka pridaná do košíka!');
    }

    public function item_delete(int $id)
    {
        $cart = session()->get('cart', []);
        $sum_price = session()->get('sum_price', 0);
        if (isset($cart[$id])){
            $sum_price -= $cart[$id]['fullPrice'];
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        session()->put('sum_price', $sum_price);
        return redirect()->back();
    }

    public function item_quantity_add(int $id)
    {
        $sum_price = session()->get('sum_price', 0);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])){
            $cart[$id]['quantity']++;
            $cart[$id]['fullPrice'] = $cart[$id]['quantity'] * $cart[$id]['price'];
            $sum_price += $cart[$id]['price'];
        }
        session()->put('sum_price', $sum_price);
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function item_quantity_sub(int $id)
    {
        $sum_price = session()->get('sum_price', 0);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])){
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
                $cart[$id]['fullPrice'] = $cart[$id]['quantity'] * $cart[$id]['price'];
                $sum_price -= $cart[$id]['price'];
            }
        }
        session()->put('sum_price', $sum_price);
        session()->put('cart', $cart);
        return redirect()->back();
    }
}
