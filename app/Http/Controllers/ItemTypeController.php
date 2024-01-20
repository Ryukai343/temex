<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemsType;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ItemTypeController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'type' => 'required|string|max:20|unique:'.ItemsType::class,
        ]);
        $item = new ItemsType();
        $item->type = $request->type;

        $item->save();

        return redirect()->route( 'items.index')->with('success', 'Kategória bola vytvorená.');
    }
    public function edit(Request $request, ItemsType $type): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('editItemType', compact('type'));
    }


    public function update(Request $request, ItemsType $type): RedirectResponse
    {
        $request->validate([
            'type' => 'required|string|max:20|unique:'.ItemsType::class,
        ]);
        $type->type = $request->type;
        $type->save();
        return redirect()->route( 'items.index')->with('success', 'Kategória bola zmenená.');
    }


    public function destroy(Request $request, ItemsType $type): RedirectResponse
    {
        foreach (Item::where('item_type_id', $type->id)->get() as $item){
            ItemController::destroy($item->id);
        }
        $type->delete();
        return redirect()->route( 'items.index')->with('success', 'Kategória bola odstránená.');
    }
}
