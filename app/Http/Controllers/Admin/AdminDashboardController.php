<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// models
use App\Models\Product;
use App\Models\Transaction;

class AdminDashboardController extends Controller
{
  public function index()
  {
    $products = Product::all();
    $totalMakanan = Product::where('category', 'food')->get()->count();
    $totalMinuman = Product::where('category', 'drink')->get()->count();
    $totalPendapatan = Transaction::where('status', 'success')->sum('price');
    return view('admin.dashboard.view', compact('products', 'totalMakanan', 'totalMinuman', 'totalPendapatan'));
  }

  // function untuk menampilkan tampilan create
  public function create()
  {
    return view('admin.dashboard.create');
  }

  // function untuk menyimpan data product ke db
  public function store(Request $request)
  {
    // validasi inputan
    $request->validate([
      'category' => 'required|in:food,drink',
      'name' => 'required|string|max:255',
      'price' => 'required|numeric|min:0',
      'cover' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // save images
    $images = $request->cover;
    $getNameImages = $images->getClientOriginalName();
    $newNameImages = Str::random(10) . '_' . $getNameImages;

    $images->storeAs('public/covers/' . $newNameImages);

    // simpan ke database
    Product::create([
      'category' => $request->category,
      'name' => $request->name,
      'price' => $request->price,
      'cover' => $newNameImages,
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Product Berhasil Di Tambahkan');
  }

  // function untuk menampilkan tampilan edit
  public function edit(Request $request, $id)
  {
    $product = Product::where('id', $id)->first();
    return view('admin.dashboard.edit', compact('product'));
  }


  // function untuk edit perubahan data product ke db
  public function updated(Request $request, $id)
  {
    // validasi inputan
    $validatedData = $request->validate([
      'category' => 'required|in:food,drink',
      'name' => 'required|string|max:255',
      'price' => 'required|numeric|min:0',
    ]);

    $product = Product::where('id', $id)->first();

    $validatedData['cover'] = $product->cover;

    if ($request->cover) {
      $request->validate(['cover' => 'required|image|mimes:jpg,jpeg,png|max:2048']);

      // save images
      $images = $request->cover;
      $getNameImages = $images->getClientOriginalName();
      $newNameImages = Str::random(10) . '_' . $getNameImages;
      $images->storeAs('public/covers/' . $newNameImages);

      // delete images
      $filePath = 'public/covers/' . $product->cover; // path file yang disimpan
      if (Storage::exists($filePath)) {
        Storage::delete($filePath); // menghapus file dari storage
      }

      // simpan cover terbaru
      $validatedData['cover'] = $newNameImages;
    }

    // simpan ke database
    $product->update($validatedData);

    return redirect()->route('admin.dashboard')->with('success', 'Product Berhasil Di Edit');
  }


  // function untuk hapus product
  public function delete($id)
  {
    $product = Product::where('id', $id)->first()->delete();

    return redirect()->route('admin.dashboard')->with('success', 'Product Berhasil Di Hapus');
  }
}
