<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            ['kode' => 'now_playing','nama_kategori' => 'Now Playing'],
            ['kode' => 'popular','nama_kategori' => 'Popular'],
            ['kode' => 'top_rated','nama_kategori' => 'Top Rated'],
            ['kode' => 'up_coming','nama_kategori' => 'Up Coming'],
        ]);
    }
}
