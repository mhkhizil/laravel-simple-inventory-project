<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemApiController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('cat');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $items = Item::when(request()->has('keyword'), function ($query) {
            $keyword = request()->keyword;
            $query->where("name", "like", "%" . $keyword . "%");
            $query->orWhere("price", "like", "%" . $keyword . "%");
            $query->orWhere("stock", "like", "%" . $keyword . "%");
        })->when(request()->has('name'), function ($query) {
            $sortType = request()->name ?? "asc";
            $query->orderBy("name", $sortType);
        })->paginate(7)->withQueryString();
        // return response()->json($items);
        return ItemResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name'=>'required|min:3|max:50|unique:items,name',
        //     'price'=>'required|numeric|gte:50',
        //     'stock'=>'required|numeric|gt:0',
        // ]);
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50|unique:items,name',
            'price' => 'required|numeric|gte:50',
            'stock' => 'required|numeric|gt:0',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->save();
        return new ItemResource($item);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => "Not found"], 404);
        }
        // return response()->json($item);
        return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50|unique:items,name',
            'price' => 'required|numeric|gte:50',
            'stock' => 'required|numeric|gt:0',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => "Not found"], 404);
        }

        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->update();
        return new ItemResource($item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => "Not found"], 404);
        }
        $item->delete();
        return response()->json(["message" => "Content deleted successfully!"], 204);
    }
}
