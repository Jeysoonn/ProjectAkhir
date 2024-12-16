<?php

namespace Database\Seeders;

use App\Models\Produk;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     // User::factory(10)->create();

    //     // User::factory()->create([
    //     //     'name' => 'Test User',
    //     //     'email' => 'test@example.com',
    //     // ]);


    // }
    public function run()
    {


        Produk::create([
            'nama_produk' => 'Silicone A100',
            'deskripsi' => 'Lem silikon tahan air untuk kamar mandi',
            'kategori' => 'Silicone Sealant',
            'stock' => 100,
            'harga' => 50000,
            'foto' => 'silicone_a100.jpg',
        ]);

        Produk::create([
            'nama_produk' => 'Door Handle Gold',
            'deskripsi' => 'Handle pintu mewah dengan bahan stainless steel',
            'kategori' => 'Hardware',
            'stock' => 50,
            'harga' => 150000,
            'foto' => 'door_handle_gold.jpg',
        ]);

        Produk::create([
            'nama_produk' => 'Smart LED Bulb',
            'deskripsi' => 'Lampu LED pintar yang bisa diatur melalui aplikasi smartphone',
            'kategori' => 'Electronics',
            'stock' => 200,
            'harga' => 120000,
            'foto' => 'smart_led_bulb.jpg',
        ]);

        Produk::create([
            'nama_produk' => 'Stainless Steel Sink',
            'deskripsi' => 'Wastafel dapur berbahan stainless steel yang tahan lama',
            'kategori' => 'Kitchenware',
            'stock' => 75,
            'harga' => 350000,
            'foto' => 'stainless_steel_sink.jpg',
        ]);

        Produk::create([
            'nama_produk' => 'Waterproof Jacket',
            'deskripsi' => 'Jaket tahan air untuk cuaca dingin dan hujan',
            'kategori' => 'Apparel',
            'stock' => 150,
            'harga' => 250000,
            'foto' => 'waterproof_jacket.jpg',
        ]);

        Produk::create([
            'nama_produk' => 'Cordless Drill',
            'deskripsi' => 'Bor tanpa kabel dengan daya tahan baterai yang lama',
            'kategori' => 'Tools',
            'stock' => 120,
            'harga' => 450000,
            'foto' => 'cordless_drill.jpg',
        ]);

        Produk::create([
            'nama_produk' => 'Electric Kettle',
            'deskripsi' => 'Ketel listrik dengan pengaturan suhu yang dapat disesuaikan',
            'kategori' => 'Home Appliances',
            'stock' => 80,
            'harga' => 180000,
            'foto' => 'electric_kettle.jpg',
        ]);

        Produk::create([
            'nama_produk' => 'Leather Wallet',
            'deskripsi' => 'Dompet kulit asli dengan desain elegan',
            'kategori' => 'Accessories',
            'stock' => 250,
            'harga' => 200000,
            'foto' => 'leather_wallet.jpg',
        ]);

        Produk::create([
            'nama_produk' => 'Gaming Mouse',
            'deskripsi' => 'Mouse gaming dengan sensitivitas tinggi dan tombol yang dapat diprogram',
            'kategori' => 'Electronics',
            'stock' => 100,
            'harga' => 300000,
            'foto' => 'gaming_mouse.jpg',
        ]);

        Produk::create([
            'nama_produk' => 'Bluetooth Speaker',
            'deskripsi' => 'Speaker Bluetooth portable dengan suara jernih dan bass kuat',
            'kategori' => 'Electronics',
            'stock' => 90,
            'harga' => 350000,
            'foto' => 'bluetooth_speaker.jpg',
        ]);

        Produk::create([
            'nama_produk' => 'Office Chair',
            'deskripsi' => 'Kursi kantor ergonomis dengan sandaran punggung yang nyaman',
            'kategori' => 'Furniture',
            'stock' => 60,
            'harga' => 700000,
            'foto' => 'office_chair.jpg',
        ]);

        Produk::create([
            'nama_produk' => 'Stainless Steel Thermos',
            'deskripsi' => 'Termos stainless steel dengan kapasitas 1 liter untuk menjaga minuman tetap panas',
            'kategori' => 'Home Appliances',
            'stock' => 150,
            'harga' => 180000,
            'foto' => 'stainless_steel_thermos.jpg',
        ]);


}}
