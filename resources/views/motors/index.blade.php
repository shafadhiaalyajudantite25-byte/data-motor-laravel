
@extends('layouts.app')

@section('title', 'Data Sepeda Motor')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Data Sepeda Motor</h2>
        <p class="text-muted mb-0">Daftar produk dan spesifikasi motor</p>
    </div>

    <a href="{{ route('motors.create') }}" class="btn btn-primary">
        + Tambah Motor
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close"
                data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Spesifikasi</th>
                        <th>Harga</th>
                        <th>QTY</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($motors as $motor)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td class="fw-semibold">
                                {{ $motor->nama_produk }}
                            </td>

                            <td>
                                {{ $motor->spesifikasi }}
                            </td>

                            <td class="text-end text-nowrap">
                                Rp {{ number_format($motor->harga, 0, ',', '.') }}
                            </td>

                            <td class="text-center">
                                {{ $motor->qty }}
                            </td>

                            <td class="text-center text-nowrap">
                                <a href="{{ route('motors.edit', $motor->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('motors.destroy', $motor->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                Belum ada data motor.
                                Silakan klik Tambah Motor.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <p class="text-muted small mb-0">
            Jumlah data: {{ $motors->count() }} motor
        </p>
    </div>
</div>

@endsection
