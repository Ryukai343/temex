<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemsType;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use function Laravel\Prompts\alert;
use function Termwind\render;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ItemsType $type): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
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
        $types = ItemsType::orderBy('type')->get();
        return view('items', compact('items'), compact('types'));

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
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
        $item->picture = $this->createPicture($request->picture, $request->name);

        $item->save();
        return redirect()->route( 'items.index')->with('success', 'Položka bola vytvorená.');
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $types = ItemsType::orderBy('type', 'asc')->get();
        return view('createItem', compact('types'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Item $item): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        //
        return view('item_detail', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|max:200',
            'picture' => 'nullable|image|max:5120',
            'price' => 'required|numeric',
        ]);
        $data = $request->all();
        if ($request->hasFile('picture')) {
//            $picture_name = $request->name.'_'.time().'.'.$request->picture->extension();
//            $request->picture->move(public_path('item_Images'), $picture_name);
            $data['picture'] = $this->createPicture($request->picture, $request->name);
            if(file_exists('item_Images/'.$item->picture)){
                unlink('item_Images/'.$item->picture);
            }
        } else {
            unset($data['picture']);
        }
        $item->update($data);
        return redirect()->route( 'items.index')->with('success', 'Položka bola zmenená.');
    }

    public function edit(Item $item): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('editItem', compact('item'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public static function destroy(string $id): JsonResponse
    {
        $item = Item::findOrFail($id);
        if(file_exists('item_Images/'.$item->picture)){
            unlink('item_Images/'.$item->picture);
        }
        alert('Položka bola vymazaná.');
        $item->delete();
        return response()->json(['message' => 'Položka bola vymazaná.']);
    }

    public function createPicture(?UploadedFile $picture, string $name): string
    {
        if ($picture !== null) {
            $pictureName = $name . '_' . time() . '.' . $picture->extension();
            $picture->move(public_path('item_Images'), $pictureName);
        }else{
            $pictureName = 'Bez obrázku';
        }

        return $pictureName;
    }

    public function search(Request $request): array
    {
        $input = '%' . $request->input('input') . '%';
        $items = Item::select('name')->where('name', 'like', $input)->orderBy('name')->take(10)->get();
        $data = [];
        foreach ($items as $item) {
            $data[] = $item->name;
        }
        return $data;
    }

    public function getByType(string $type_id)
    {
//        $typeId = $request->input('type_id');
        // Fetch tems based on the selected type
        $items= Item::where('item_type_id', $type_id)->orderBy('name')->get();
        $types = ItemsType::orderBy('type')->get();
//        return response()->json(\view('items', compact('items'), compact('types')));
        return view('items', compact('items'), compact('types'))->render();
//        return response()->json($items);
    }
}
