<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=Item::when(request()->has('keyword'),function($query){
            $keyword=request()->keyword;
            $query->where("name","like","%".$keyword."%");
            $query->orWhere("price","like","%".$keyword."%");
            $query->orWhere("stock","like","%".$keyword."%");
        })->when(request()->has('name'),function($query){
            $sortType=request()->name ??"asc";
            $query->orderBy("name",$sortType);
        })->paginate(7)->withQueryString();
        return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
