<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function  index() {
        return inertia('Items/Index', [
            'items' => Item::orderBy('name')->get()
        ]);
    }

    public function search($searchKey) {
        return inertia('Items/Index', [
            'items' => Item::where('name', 'like', "%$searchKey%")->get()
        ]);
    }

    public function create() {
        return inertia('Items/Create');
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $fileName = null;

        //process image
        if($request->pic){
            $fileName = time().'.'.$request->pic->extension();
            $request->pic->move(public_path('images/product_pics'), $fileName);
            $fields['pic'] = $fileName;
        }

        Item::create($fields);

        return redirect('/items');
    }

    public function show(Item $item) {
        return inertia('Items/Show',[
            'item' => $item
        ]);
    }

    public function toggle(Item $item) {
        $item->enabled = !$item->enabled;
        $item->save();
        return back();
    }
}
