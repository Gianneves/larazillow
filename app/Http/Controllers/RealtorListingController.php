<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RealtorListingController extends Controller
{
    public function index()
    {
        $listing = Auth::user()->listings;
        return Inertia::render('Realtor/Index', compact('listing'));
    }
}
