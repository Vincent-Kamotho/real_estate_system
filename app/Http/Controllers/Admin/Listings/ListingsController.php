<?php

namespace App\Http\Controllers\Admin\Listings;

use App\Models\Admin\Owner;
use Illuminate\Http\Request;
use App\Models\Admin\Listing;
use App\Http\Controllers\Controller;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::all();
        return view('admin.listings.listings')->with('listings' , $listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Owner::pluck('owner_name');
        return view('admin.listings.addlisting')->with('owners' , $owners);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);


        $listing = new Listing;
        $listing->property_type = $request->input('property_type');
        $listing->property_name = $request->input('property_name');
        $listing->location = $request->input('location');
        $listing->price = $request->input('price');
        $listing->owner = $request->input('owner_name');
        $listing->purpose = $request->input('purpose');
        $listing->description = $request->input('description');
        $listing->image = 'images/' . $imageName;
        
        $listing->save();

        return redirect()->route('show_listings')->with('success', 'Property Successfully Added to Our System');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owners = Owner::pluck('owner_name');
        $listing = Listing::find($id);
        return view('admin.listings.editlisting')->with('listing' , $listing) ->with('owners', $owners);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $listing = Listing::find($id);

        $listing->property_type = $request->input('property_type');
        $listing->property_name = $request->input('property_name');
        $listing->location = $request->input('location');
        $listing->price = $request->input('price');
        $listing->owner = $request->input('owner_name');
        $listing->purpose = $request->input('purpose');

        $listing->update();
        return redirect()->route('show_listings')->with('success', 'Property Successfully Updated');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        $listing->delete();

        return redirect()->route('show_listings')->with('success', 'Record Successfully Deleted');
    }

    
}
