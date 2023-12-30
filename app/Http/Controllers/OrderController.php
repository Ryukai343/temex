<?php

namespace App\Http\Controllers;


use App\Models\HeaderOrder;
use App\Models\ItemsOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (ProfileController::roleCheck(auth()->user()->role)) {
            $orders = HeaderOrder::orderBy('created_at')->get();
        }else {
            $orders = HeaderOrder::orderBy('created_at')->where('user', auth()->user()->id)->get();
        }

        return view('orders', compact('orders'));
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
            'photo' => 'image|max:5120',
            'description' => 'required|string|max:200|nullable',
        ]);
        if (auth()->user() == null) {
            return redirect()->route('login');
        }
        $headerOrder = new HeaderOrder();

        $headerOrder->user = auth()->user()->id;
        $headerOrder->name = $request->firstName;
        $headerOrder->surname = $request->lastName;
        $headerOrder->email = $request->email;
        $headerOrder->phone = $request->phone;
        $headerOrder->city = $request->city;
        $headerOrder->psc = $request->zip;
        $headerOrder->description = $request->description;
        $sum_price = session()->get('sum_price', 0);
        $headerOrder->total_price = $sum_price;
        $headerOrder->status = 'nová';

        if ($request->photo !== null) {
            $headerOrder->photo = $headerOrder->user . '_' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('order_images'), $headerOrder->photo);
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
        return redirect()->route('order.detail', $headerOrder);
    }

    /**
     * Display the specified resource.
     */
    public function detail(Request $request, HeaderOrder $order)
    {
        if (!ProfileController::roleCheck(auth()->user()->role) && auth()->user()->id != $order->user) {
            return redirect()->route('items.index');
        }
        if (ProfileController::roleCheck(auth()->user()->role) && $order->status == 'nová') {
            $order->status = 'otvorená';
            $order->save();
        }
        $items = DB::table('items_orders')
            ->join('items', 'items_orders.item_id', '=', 'items.id')
            ->where('header_order_id', $order->id)
            ->select('*')
            ->get();
        $headerOrder = $order;
        return view('order_detail', compact('headerOrder', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeaderOrder $headerOrder)
    {
        if ($headerOrder->status == 'vybavená') {
            $headerOrder->status = 'otvorená';
            $text = 'Objednávka bola znovu otvorená.';
        }else {
            $headerOrder->status = 'vybavená';
            $text = 'Objednávka bola ukončená.';
        }
        //return $headerOrder;

        $headerOrder->save();
        return redirect()->back()->with('status', $text);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
