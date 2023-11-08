<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return Inertia::render("Dashboard", ['units' => $units]);
    }
}
