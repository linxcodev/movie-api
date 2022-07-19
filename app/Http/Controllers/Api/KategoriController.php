<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Movie;
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
}
