<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Paket;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
{
    $request->validate([
        'paket_id' => 'required|exists:tb_paket,id',
        'qty' => 'required|integer|min:1',
    ]);

    $cart = Cart::firstOrCreate([
        'user_id' => auth()->id()
    ]);

    $paket = Paket::findOrFail($request->paket_id);

    $item = CartItem::where('cart_id', $cart->id)
        ->where('paket_id', $paket->id)
        ->first();

    if ($item) {
        $item->qty += $request->qty;
        $item->save();
    } else {
        CartItem::create([
            'cart_id' => $cart->id,
            'paket_id' => $paket->id,
            'qty' => $request->qty,
            'harga' => $paket->harga,
        ]);
    }

    return redirect()->route('cart.index')
        ->with('success', 'Item berhasil ditambahkan ke keranjang');
}

    public function index()
    {
        $cart = Cart::with('items.paket')
            ->where('user_id', auth()->id())
            ->first();

        return view('cart.index', compact('cart'));
    }
}
