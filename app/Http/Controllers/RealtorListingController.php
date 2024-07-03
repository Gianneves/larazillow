<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RealtorListingController extends \Illuminate\Routing\Controller
{

    use AuthorizesRequests;

    public function __construct()
    {   
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index()
    {
        $listing = Auth::user()->listings;
        return Inertia::render('Realtor/Index', compact('listing'));
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()
            ->with('success', 'Listing was deleted');
    }
}
