<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduk;
use App\Models\OrderHistory;
use App\Models\Produk;
use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function tambahKeKeranjang($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk menambahkan produk ke keranjang.');
        }

        $user = Auth::user();
        $orders = Order::firstOrCreate(
        ['user_id' => $user->id, 'status' => 'Pending',],
        ['order_total' => 0]
        );

        $produk = Produk::findOrFail($id);
        $pivot = $orders->produks()->where('produk_id', $produk->id)->first();

        if ($pivot) {
            $newJumlah = $pivot->pivot->jumlah_produk + 1;
            $orders->produks()->updateExistingPivot($produk->id, [
                'jumlah_produk' => $newJumlah,
                'subtotal' => $produk->harga * $newJumlah
            ]);
            $orders->order_total += $produk->harga;

        } else {
            $orders->produks()->attach($produk->id, [
                'jumlah_produk' => 1,
                'subtotal' => $produk->harga
            ]);
            $orders->order_total += $produk->harga;

        }
        $orders->save();
        return redirect()->route('keranjang', compact('orders'))->with('success', 'Produk berhasil ditambahkan ke keranjang!');

    }

    public function keranjang()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk melihat keranjang.');
        }

        $user = Auth::user();
        $orders = Order::all();
        $orders = Order::where('user_id', $user->id)->first();;

    if (!$orders) {
        return view('user.keranjang')->with('error', 'Keranjang Anda kosong.');
    }
    $orders->load('produks');
        return view('user.keranjang', compact('orders'));
    }

    public function checkout()
    {
        $user = Auth::user();

        $orders = Order::all();
        $orders = Order::where('user_id', $user->id)->first();;
        $orders->status = 'Pending';
        if (!$orders) {
            return redirect()->route('keranjang')->with('error', 'Keranjang kosong!');
        }


        return  view('user.order', compact('orders'))->with('success', 'Checkout berhasil!');
    }
    public function pembayaran(Request $request)
    {

        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->where('status', 'Pending')->first();

        if (!$orders) {
            return redirect()->route('keranjang')->with('error', 'Keranjang kosong atau sudah tercheckout!');
        }



        foreach ($orders->produks as $produk) {
            OrderHistory::create([
                'user_id' => $user->id,
                'email' => $user->email,
                'order_total' => $orders->order_total,
                'status' => 'Completed',
                'produk_nama' => $produk->nama_produk,
                'produk_harga' => $produk->harga,
                'jumlah_produk' => $produk->pivot->jumlah_produk,
                'produk_subtotal' => $produk->pivot->subtotal,
            ]);
        }
        $orders->status = 'Completed';

        $pembayaran = new Pembayaran();
        $pembayaran->jumlah = $orders->order_total;
        $pembayaran->tanggal_pembayaran = now();
        $pembayaran->order_id = $orders->id;
        $pembayaran->user_id = $user->id;
        $pembayaran->save();

        $orders->produks()->detach();
        foreach ($orders->produks as $produk) {
            $produk->stock -= $produk->pivot->jumlah_produk;
            $produk->save();
        }
        $orders->delete();
        return redirect()->route('user.orders')->with('success', 'Pembayaran berhasil! Order telah diproses.');
    }
    public function showOrderHistory()
    {
        $user = Auth::user();
        $orderHistories = OrderHistory::where('user_id', $user->id)->get();

        return view('user.order-history', compact('orderHistories'));
    }

        public function hapusDariKeranjang($id)
        {
            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'Anda harus login untuk menghapus produk dari keranjang.');
            }

            $user = Auth::user();
            $orders = Order::where('user_id', $user->id)->first();
            if (!$orders) {
                return redirect()->route('keranjang')->with('error', 'Keranjang kosong atau sudah tercheckout!');
            }

            $pivot = $orders->produks()->where('produk_id', $id)->first();
            if (!$pivot) {
                return redirect()->route('keranjang')->with('error', 'Produk tidak ditemukan di keranjang.');
            }

            $currentJumlah = $pivot->pivot->jumlah_produk;

            if ($currentJumlah > 1) {
                $newJumlah = $currentJumlah - 1;
                $newSubtotal = $pivot->harga * $newJumlah;

                $orders->produks()->updateExistingPivot($id, [
                'jumlah_produk' => $newJumlah,
                'subtotal' => $newSubtotal,
            ]);
            $orders->order_total -= $pivot->harga;
            $orders->save();
            } else {
            $orders->produks()->detach($id);
            $orders->order_total -= $pivot->harga;
            $orders->save();
            return redirect()->route('keranjang', compact('orders'))->with('success', 'Produk berhasil dihapus dari keranjang.');
        }
    }
}
