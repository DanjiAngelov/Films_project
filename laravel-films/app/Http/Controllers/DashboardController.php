<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'count' => Movie::count(),
            'latest' => Movie::latest()->take(5)->get()
        ]);
    }
}
