<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class LandingPagesController extends Controller
{
    public function index() {
      $products = Product::all();
      return view('home', compact('products'));
    }
}
