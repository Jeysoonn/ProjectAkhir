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
    public function run(): void
    {
        Produk::create([
            'nama_produk' => 'Produk Asuuuuu',
            'kategori' => 'Kategori 1',
            'stock' => 100,
            'deskripsi' => 'Deskripsi produk A yang sangat menarik.',
            'harga' => 150000, // Tambahkan harga
        ]);

        Produk::create([
            'nama_produk' => 'Produk B',
            'kategori' => 'Kategori 2',
            'stock' => 50,
            'deskripsi' => 'Deskripsi produk B dengan berbagai keunggulan.',
            'harga' => 200000, // Tambahkan harga
        ]);

        Produk::create([
            'nama_produk' => 'Produk C',
            'kategori' => 'Kategori 1',
            'stock' => 200,
            'deskripsi' => 'Deskripsi produk C yang memiliki fitur terbaik.',
            'harga' => 250000, // Tambahkan harga
        ]);
}}
