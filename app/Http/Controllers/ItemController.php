<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Contracts\Support\ValidatedData;
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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'picture' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Store the data in your table
        $item = Item::create($validatedData);
        return ItemController::index();
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
