<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
  public function index()
  {
    $orders = Transaction::where('status', 'pending')->get();
    return view('admin.order.view', compact('orders'));
  }

  public function update(Request $request, $id)
  {
    $orders = Transaction::where('id', $id)->first();

    // simpan ke database
    $orders->update(['status' => 'success']);
    return redirect()->back()->with('success', 'Perubahan Berhasil Di Simpan');
  }
}
