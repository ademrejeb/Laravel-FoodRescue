<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
  {
    $products = Product::where('stock_status', 'disponible')->get();

    return view('frontend.main', compact('products'));
  }
}
