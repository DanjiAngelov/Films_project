<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'moviesCount' => Movie::count(),
            'latestMovies' => Movie::latest()->take(5)->get(),
        ]);
    }
}
