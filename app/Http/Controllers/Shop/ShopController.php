<?php

namespace App\Http\Controllers\Shop;

use App\Models\Commodity;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop.index');
    }

    public function category()
    {
        return view('shop.category')->with([
            'items' => Commodity::all()
        ]);
    }
}
