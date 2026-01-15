<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork;

class ShopController extends Controller
{
    // =======================
    // TAMBAH KE CART
    // =======================
    public function addToCart($id)
    {
        $art = Artwork::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'id'    => $art->id,
                'title' => $art->title,
                'price' => $art->price,
                'image' => $art->image,
                'qty'   => 1
            ];
        }

        session()->put('cart', $cart);
        return back();
    }

    // =======================
    // CART PAGE
    // =======================
    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // =======================
    // TAMBAH QTY
    // =======================
    public function increase($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
            session()->put('cart', $cart);
        }
        return back();
    }

    // =======================
    // KURANG QTY
    // =======================
    public function decrease($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['qty']--;
            if ($cart[$id]['qty'] <= 0) {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }
        return back();
    }

    // =======================
    // CHECKOUT PAGE
    // =======================
    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect('/cart');
        }

        $total = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']);
        return view('checkout', compact('cart', 'total'));
    }

    // =======================
    // PROSES CHECKOUT
    // =======================
    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) return redirect('/cart');

        $invoice = [
            'invoice_number' => 'INV-' . time(),
            'name'    => $request->name,
            'address' => $request->address,
            'items'   => $cart,
            'total'   => collect($cart)->sum(fn($i) => $i['price'] * $i['qty']),
            'date'    => now()->format('d M Y')
        ];

        session()->forget('cart');
        session()->put('invoice', $invoice);

        return redirect()->route('invoice');
    }
}
