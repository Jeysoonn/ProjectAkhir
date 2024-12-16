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
        if ($produk->stock <= 0) {
            return redirect()->route('keranjang')->with('error', 'Stok produk tidak cukup!');
        }

        $orders->produks()->attach($produk->id, [
            'jumlah_produk' => 1,
            'subtotal' => $produk->harga * 1,
        ]);

        $orderTotal = $orders->produks()->wherePivot('order_id', $orders->id)->sum('subtotal');
        $orders->order_total = $orderTotal;
        $orders->save();

        $produk->stock -= 1;
        $produk->save();
        
        return redirect()->route('keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
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
    // Menemukan order dengan status 'pending' untuk user yang sedang login
    $orders = Order::where('user_id', $user->id)->where('status', 'Pending')->first();

    if (!$orders) {
        return redirect()->route('keranjang')->with('error', 'Keranjang kosong atau sudah tercheckout!');
    }


    // Menyimpan transaksi pembayaran
    $pembayaran = new Pembayaran();
    $pembayaran->jumlah = $orders->order_total;  // Pembayaran sesuai dengan total order
    $pembayaran->tanggal_pembayaran = now();  // Tanggal saat ini
    $pembayaran->order_id = $orders->id;  // Relasikan pembayaran dengan order
    $pembayaran->user_id = $orders->user_id;
    $pembayaran->save();

    foreach ($orders->produks as $produk) {
        OrderHistory::create([
            'user_id' => $user->id,
            'order_total' => $orders->order_total,
            'status' => 'Completed',
            'produk_nama' => $produk->nama_produk,
            'produk_harga' => $produk->harga,
            'jumlah_produk' => $produk->pivot->jumlah_produk,
            'produk_subtotal' => $produk->pivot->subtotal,
        ]);
    }

    $orders->status = 'Completed';

    $orders->produks()->detach();


    // Membuat order baru untuk keranjang berikutn

    return redirect()->route('user.orders')->with('success', 'Pembayaran berhasil! Order telah diproses.');

}

    // public function showUserOrders()
    // {
    //     $user = Auth::user();
    //     $orders = $user->orders;
    //     $pembayaran = Pembayaran::All();
    //     return view('user.order-history', compact('orders', 'pembayaran'));
    // }

    // Controller untuk menampilkan riwayat order
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

    // Cari order aktif user
    $order = Order::where('user_id', $user->id)
                  ->first();

    if (!$order) {
        return redirect()->route('keranjang')->with('error', 'Keranjang kosong atau sudah tercheckout!');
    }

    // Hapus produk dari keranjang
    $order->produks()->detach($id);

    return redirect()->route('keranjang')->with('success', 'Produk berhasil dihapus dari keranjang.');
}
}
