<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Transaction;

class MemberTransactionController extends Controller
{
  public function checkout(Request $request)
  {
    $validate = $request->validate([
      'price' => 'required|numeric',
      'no_telp' => 'required',
    ]);

    if (Auth::user()) {
      Transaction::create($validate);
      return redirect()->route('home')->with('success', 'Berhasil Membeli Product, Mohon Tunggu Hingga CS Menghubungi Anda!');
    }
    return redirect()->route('member.login')->with('error', 'Silahkan Login Terlebih Dahulu');
  }
}
