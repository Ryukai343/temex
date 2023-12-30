<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemsType;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:20|unique:'.ItemsType::class,
        ]);
        $item = new ItemsType();
        $item->type = $request->type;

        $item->save();

        // Store the data in your table
        //$item = Item::create($validatedData);

        return redirect()->route( 'items.index');
    }
    public function edit(Request $request, ItemsType $type)
    {
        return view('editItemType', compact('type'));
    }


    public function update(Request $request, ItemsType $type)
    {
        $request->validate([
            'type' => 'required|string|max:20|unique:'.ItemsType::class,
        ]);
        $type->type = $request->type;
        $type->save();
        return redirect()->route( 'items.index');
    }


    public function destroy(Request $request, ItemsType $type)
    {
        foreach (Item::where('item_type_id', $type->id)->get() as $item){
            ItemController::destroy($item->id);
        }
        $type->delete();
        return redirect()->route( 'items.index');
    }
}
