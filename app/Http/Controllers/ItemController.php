<?php

namespace App\Http\Controllers;




class ItemController extends Controller
{
    public function create(){
        return view('inventory.create');
    }
    public function index(){
        return view('inventory.index');
    }
}
