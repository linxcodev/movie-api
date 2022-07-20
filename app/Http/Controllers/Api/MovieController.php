<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Movie;
use App\Helpers\SendResponse;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    /**
     * Show resource.
     *
     * @return Object
     */
    public function index(string $uri)
    {
        return SendResponse::acceptData(Movie::get($uri));
    }
}
