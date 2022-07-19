<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Movie;
use App\Http\Controllers\Controller;

class NowPlayingController extends Controller
{
    /**
     * Show resource.
     *
     * @return void
     */
    public function index()
    {
        return Movie::get();
    }

    //
}
