<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ListingController extends \Illuminate\Routing\Controller
{
  
    use AuthorizesRequests;

    public function __construct()
    {   
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(Listing::class, 'listing');
    }

      /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

       
        return Inertia::render(
            'Listing/Index',
            [
                'filters' => $filters,
                'listing' => Listing::mostRecent()
                    ->filter($filters)
                    ->paginate(10)
                    ->withQueryString()
            ]
        );
    }

    public function show(Listing $listing)
    {
        $listing->load(['images']);
        return Inertia::render('Listing/Show', compact('listing'));
    }

}
