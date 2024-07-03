<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class RealtorListingController extends Controller
{
    public function index()
    {
        return Inertia::redner('Realtor/Index');
    }
}
