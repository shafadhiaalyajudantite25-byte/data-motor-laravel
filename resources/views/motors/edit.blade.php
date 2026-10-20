
@extends('layouts.app')

@section('title', 'Edit Motor')

@section('content')

<div class="card shadow-sm mx-auto border-0" style="max-width: 800px;">
    <div class="card-header bg-warning py-3">
        <h4 class="mb-0">Edit Data Sepeda Motor</h4>
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

        <form action="{{ route('motors.update', $motor->id) }}"
              method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk"
                       class="form-control"
                       value="{{ old('nama_produk', $motor->nama_produk) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Spesifikasi</label>
                <textarea name="spesifikasi" class="form-control"
                          rows="4" required>{{ old('spesifikasi', $motor->spesifikasi) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga (Rp)</label>
                <input type="number" name="harga"
                       class="form-control" min="0"
                       value="{{ old('harga', $motor->harga) }}"
                       required>
            </div>

            <div class="mb-4">
                <label class="form-label">QTY</label>
                <input type="number" name="qty"
                       class="form-control" min="0"
                       value="{{ old('qty', $motor->qty) }}"
                       required>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a href="{{ route('motors.index') }}"
               class="btn btn-secondary">
                Batal
            </a>
        </form>
    </div>
</div>

@endsection
