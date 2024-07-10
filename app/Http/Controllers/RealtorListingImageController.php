<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        return Inertia::render('Realtor/ListingImage/Create', compact('listing'));
    }

    public function store(Request $request)
    {
        dd('works');
    }
}
