<?php

namespace App\Http\Controllers;

use App\Models\ItemsType;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|unique:'.ItemsType::class,
        ]);
        $item = new ItemsType();
        $item->type = $request->type;

        $item->save();

        // Store the data in your table
        //$item = Item::create($validatedData);

        return redirect()->route( 'items.index');
    }
    public function edit(Request $request)
    {
    }


    public function update(Request $request)
    {

    }


    public function destroy(Request $request)
    {

    }
}
