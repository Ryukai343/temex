<?php

namespace App\Http\Controllers;

use App\Models\HeaderOrder;
use App\Models\ItemsOrder;
use Illuminate\Http\Request;

class HeaderOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName'=> 'required|string|max:20',
            'lastName'=> 'required|string|max:20',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'city' => 'required|string',
            'zip' => 'required|numeric',
            'customPhoto' => 'image|size:20480',
            'description' => 'required|string|max:200|nullable',
        ]);
        if (auth()->user() == null) {
            return redirect()->route('login');
        }
        $headerOrder = new HeaderOrder();

        $headerOrder->user = auth()->user()->id;
        $headerOrder->email = $request->email;
        $headerOrder->phone = $request->phone;
        $headerOrder->city = $request->city;
        $headerOrder->psc = $request->zip;
        $headerOrder->description = $request->description;
        $sum_price = session()->get('sum_price', 0);
        $headerOrder->total_price = $sum_price;
        $headerOrder->status = 'nová';

        if ($request->customPhoto !== null) {
            $headerOrder->photo = $headerOrder->user . '_' . time() . '.' . $request->customPhoto->extension();
            $request->customPhoto->move(public_path('order_images'), $headerOrder->photo);
        }else{
            $headerOrder->photo = 'Bez obrázku';
        }

        $headerOrder->save();
        $items = session()->get('cart', []);
        foreach ($items as $id => $item) {
            $itemsOrder = new ItemsOrder();
            $itemsOrder->header_order_id = $headerOrder->id;
            $itemsOrder->item_id = $id;
            $itemsOrder->quantity = $item['quantity'];
            $itemsOrder->save();
        }
        session()->forget('cart');
        $sum_price = 0;
        session()->put('sum_price', $sum_price);
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
