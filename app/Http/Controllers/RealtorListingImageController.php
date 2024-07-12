<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        $listing->load(['images']);
        return Inertia::render('Realtor/ListingImage/Create', compact('listing'));
    }

    public function store(Listing $listing, Request $request)
    {
        if($request->hasFile('images')) {
            $request->validate([
                'images.*' => 'mimes:jpg,png,jpeg,webp|max:5000'
            ], [
                'images.*mines' => 'The file should be in one of the formats: jpg, png, jpeg, webp'
            ]);
            foreach($request->file('images') as $file) {
                $path = $file->store('images', 'public');

                $listing->images()->save(new ListingImage([
                    'filename' => $path
                ]));
            }
        }

        return redirect()->back()->with('success', 'Images uploaded');
    }

    public function destroy($listing, ListingImage $image)
    {
        Storage::disk('public')->delete($image->filename);
        $image->delete();

        return back()->with('success', 'Image was deleted!');
    }

}
