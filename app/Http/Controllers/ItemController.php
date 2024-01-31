<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create()
    {
        return view('inventory.create');
    }
    public function index()
    {
        return view('inventory.index');
    }
    public function store(Request $request)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->save();
        //object instance ma sout chin yin Item modal class htl ka create static method ko d lo sout lo ya $items=Item::create(['name'=>'apple',price=>500])
        return $item;
    }
}
