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
        //d mhr ll $items= new Item() so p instatnce sout p mha $items->all() so p use lo ll ya dl
        return view('inventory.index', [
            'items' => Item::paginate(7)
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:50|unique:items,name',
            'price'=>'required|numeric|gte:50',
            'stock'=>'required|numeric|gt:0',
        ]);
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->save();
        //object instance ma sout chin yin Item modal class htl ka create static method ko d lo sout lo ya $items=Item::create(['name'=>'apple',price=>500])but d nee ko tone ml so yin modal htl mhr protected $fillable=['name','price','stock']; so p twr yay py ya ml//create() asar insert() ll tone lo ya dl but  insert ka eloquent ORM nk tone dr ma hk pl query builder nk tone dr fik twr p // insert ko ton yin ka insert ka db ko takhr pl khine dl data store pho takhu pl create ka kya dot db ko data store dl id u dl id nk db htl ka data ko pyn htote dl 3 khr lout khine dl inser ka created at updated at dg ma htl py woo
        return redirect()->route('item.index');
    }
    public function show($id)
    {


        return  view('inventory.show', ["item" => Item::findOrFail($id)]);
    }
    public function edit($id)
    {
        return  view('inventory.edit', ["item" => Item::findOrFail($id)]);
    }
    public function update($id,Request $request){
        $item=Item::findOrFail($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->update();
        return redirect()->route('item.index');
    }
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
