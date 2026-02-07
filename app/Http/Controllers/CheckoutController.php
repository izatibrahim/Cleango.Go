<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function store()
    {
        $cart = Cart::with('items.paket')
            ->where('user_id', auth()->id())
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->back()->with('error', 'Cart kosong');
        }

        DB::transaction(function () use ($cart) {

            // 1. hitung total
            $total = $cart->items->sum(function ($item) {
                return $item->qty * $item->harga;
            });

            // 2. buat order
            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $total,
                'status' => 'pending',
            ]);

            // 3. pindahkan cart_items → order_items
            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'paket_id' => $item->paket_id,
                    'qty' => $item->qty,
                    'harga' => $item->harga,
                ]);
            }

            // 4. kosongkan cart
            $cart->items()->delete();
            $cart->delete();
        });

        return redirect()->route('cart.index')
    ->with('success', 'Checkout berhasil! Pesanan sedang diproses.');
    }
}
