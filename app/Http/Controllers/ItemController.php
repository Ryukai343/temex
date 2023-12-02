<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use function Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();

        return view('items', compact('items'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:4',
            'description' => 'required|string',
            'picture' => 'required|url',
            'price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('items.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Store the data in your table
        $item = Item::create($validator);
        return dd($item);
    }

    public function create()
    {
        return view('createItem');
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
