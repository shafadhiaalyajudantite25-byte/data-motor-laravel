<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    // Menampilkan semua data motor
    public function index()
    {
        $motors = Motor::latest()->get();

        return view('motors.index', compact('motors'));
    }

    // Menampilkan form tambah motor
    public function create()
    {
        return view('motors.create');
    }

    // Menyimpan data motor baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_produk' => 'required|string|max:100',
            'spesifikasi' => 'required|string',
            'harga' => 'required|integer|min:0',
            'qty' => 'required|integer|min:0',
        ]);

        Motor::create($data);

        return redirect()->route('motors.index')
            ->with('success', 'Data motor berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit(Motor $motor)
    {
        return view('motors.edit', compact('motor'));
    }

    // Memperbarui data motor
    public function update(Request $request, Motor $motor)
    {
        $data = $request->validate([
            'nama_produk' => 'required|string|max:100',
            'spesifikasi' => 'required|string',
            'harga' => 'required|integer|min:0',
            'qty' => 'required|integer|min:0',
        ]);

        $motor->update($data);

        return redirect()->route('motors.index')
            ->with('success', 'Data motor berhasil diperbarui!');
    }

    // Menghapus data motor
    public function destroy(Motor $motor)
    {
        $motor->delete();

        return redirect()->route('motors.index')
            ->with('success', 'Data motor berhasil dihapus!');
    }
}
