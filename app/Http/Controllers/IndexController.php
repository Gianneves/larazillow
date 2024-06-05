<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index() {
        
        return Inertia::render('Index/Index', ['message' => 'Hello from Laravel!']);
    }

    public function show() {
        return Inertia::render('Index/Show');
    }
}
