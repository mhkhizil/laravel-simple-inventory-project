<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(){
        return view('inventory.create');
    }
    public function index(){
        return view('inventory.index');
    }
    public function store(Request $request){
        dd($request);
        return $request;
    }
}
