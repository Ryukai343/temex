<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemsType;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use function Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ItemsType $type)
    {
        if ($type->id == null) {
            $items = Item::orderBy('name')->get();
        } else {
            $items = Item::where('item_type_id', $type->id)->orderBy('name')->get();
        }
        if ($request->input != null) {
            $input = '%' . $request->input('input') . '%';
            $items = Item::where('name', 'like', $input)->orderBy('name')->get();
        }
        //return dd($items);
        //$items = Item::all();
        $types = ItemsType::orderBy('type')->get();
        return view('items', compact('items'), compact('types'));

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:'.Item::class,
            'type'=> 'required|exists:'.ItemsType::class.',id',
            'description' => 'required|string|max:200',
            'picture' => 'nullable|image|max:5120',
            'price' => 'required|numeric',
        ]);
        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->item_type_id = $request->type;

        // Save image to storage
        if ($request->picture !== null) {
            $item->picture = $item->name . '_' . time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('item_Images'), $item->picture);
        }else{
            $item->picture = 'Bez obrázku';
        }

        $item->save();

        // Store the data in your table
        //$item = Item::create($validatedData);

        return redirect()->route( 'items.index')->with('success', 'Položka bola vytvorená.');
    }

    public function create()
    {
        $types = ItemsType::orderBy('type', 'asc')->get();
        return view('createItem', compact('types'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
        return view('item_detail', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|max:200',
            'picture' => 'nullable|image|max:5120',
            'price' => 'required|numeric',
        ]);
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $picture_name = $request->name.'_'.time().'.'.$request->picture->extension();
            $data['picture'] = $picture_name;
            $request->picture->move(public_path('item_Images'), $picture_name);
            if(file_exists('item_Images/'.$item->picture)){
                unlink('item_Images/'.$item->picture);
            }
        } else {
            unset($data['picture']);
        }
        $item->update($data);
        return redirect()->route( 'items.index')->with('success', 'Položka bola zmenená.');
    }

    public function edit(Item $item)
    {
        return view('editItem', compact('item'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public static function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        if(file_exists('item_Images/'.$item->picture)){
            unlink('item_Images/'.$item->picture);
        }

        $item->delete();
        return redirect()->back()->with('success', 'Položka bola vymazaná.');
    }
}
