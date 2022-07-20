<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Movie;
use Illuminate\Http\Request;
use App\Helpers\SendResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class KategoriController extends Controller
{
    /**
     * Show resource.
     *
     * @return void
     */
    public function index()
    {
        $kategori = DB::table('kategori')->get();
        return SendResponse::acceptData($kategori);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode'          => 'required|unique:kategori,kode',
            'nama_kategori' => 'required',
        ]);

        DB::table('kategori')->insert([
            'kode'          => $request->kode,
            'nama_kategori' => $request->nama_kategori,
        ]);

        return SendResponse::accept("Sukses Tambah Kategori!");
    }

    public function edit(String $kode)
    {
        $kategori = DB::table('kategori')->where('kode', $kode);
        return SendResponse::acceptData($kategori->first());
    }

    public function update(String $kode, Request $request)
    {
        $request->validate([
            'kode'          => 'required|unique:kategori,kode',
            'nama_kategori' => 'required',
        ]);

        DB::table('kategori')->where('kode', $kode)->update([
            'kode'          => $request->kode,
            'nama_kategori' => $request->nama_kategori,
        ]);

        return SendResponse::accept("Sukses Update Kategori!");
    }

    public function delete(String $kode)
    {
        DB::table('kategori')->where('kode', $kode)->delete();
        return SendResponse::accept("Sukses Delete Kategori!");
    }
}
