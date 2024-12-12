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


}}
