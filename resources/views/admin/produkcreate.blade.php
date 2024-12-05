@extends('layoutadmin.appadmin')

@section('title', 'Dashboard')

@section('content')
<!-- Modal -->
<div class="modal fade" id="inputProdukModal" tabindex="-1" aria-labelledby="inputProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="inputProdukModalLabel">Tambah Produk Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/produk/store" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Nama Produk -->
            <div class="mb-3">
              <label for="namaProduk" class="form-label">Nama Produk</label>
              <input type="text" class="form-control" id="namaProduk" name="nama_produk" placeholder="Masukkan nama produk" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
              <label for="deskripsiProduk" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="deskripsiProduk" name="deskripsi" rows="3" placeholder="Masukkan deskripsi produk" required></textarea>
            </div>

            <!-- Kategori -->
            <div class="mb-3">
              <label for="kategoriProduk" class="form-label">Kategori</label>
              <select class="form-select" id="kategoriProduk" name="kategori" required>
                <option value="" disabled selected>Pilih kategori</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Pakaian">Pakaian</option>
                <option value="Makanan">Makanan</option>
                <!-- Tambahkan kategori lainnya sesuai kebutuhan -->
              </select>
            </div>

            <!-- Stok -->
            <div class="mb-3">
              <label for="stock" class="form-label">Stok</label>
              <input type="number" class="form-control" id="stockProduk" name="stock" placeholder="Masukkan jumlah stok" required>
            </div>

            <!-- Harga -->
            <div class="mb-3">
              <label for="hargaProduk" class="form-label">Harga</label>
              <input type="number" class="form-control" id="hargaProduk" name="harga" placeholder="Masukkan harga produk" required>
            </div>

            <!-- Foto -->
            <div class="mb-3">
              <label for="fotoProduk" class="form-label">Foto Produk</label>
              <input type="file" class="form-control" id="fotoProduk" name="foto" accept="image/*" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan Produk</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
