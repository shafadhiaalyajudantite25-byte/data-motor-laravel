
@extends('layouts.app')

@section('title', 'Tambah Motor')

@section('content')

<div class="card shadow-sm mx-auto border-0" style="max-width: 800px;">
    <div class="card-header bg-primary text-white py-3">
        <h4 class="mb-0">Tambah Data Sepeda Motor</h4>
    </div>

    <div class="card-body p-4">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('motors.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk"
                       class="form-control"
                       value="{{ old('nama_produk') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Spesifikasi</label>
                <textarea name="spesifikasi" class="form-control"
                          rows="4" required>{{ old('spesifikasi') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga (Rp)</label>
                <input type="number" name="harga"
                       class="form-control" min="0"
                       value="{{ old('harga') }}" required>
            </div>

            <div class="mb-4">
                <label class="form-label">QTY</label>
                <input type="number" name="qty"
                       class="form-control" min="0"
                       value="{{ old('qty') }}" required>
            </div>

            <button type="submit" class="btn btn-success">
                Simpan Data
            </button>

            <a href="{{ route('motors.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>

@endsection
