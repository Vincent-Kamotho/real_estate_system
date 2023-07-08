<?php

namespace App\Http\Controllers\Admin\Owners;

use App\Models\Admin\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;




class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::all();
        
        return view('admin.owners.listowners')->with('owners' , $owners);
    }
    public function list()
    {
        $owners = Owner::all();

        return view('admin.owners.listowners')->with('owners' , $owners);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.owners.addowners');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'contacts' => 'required|max:255',
        ]);
       
        $owner = new Owner;
        $owner->owner_name = $request->input('name');
        $owner->owner_email = $request->input('email');
        $owner->owner_contacts = $request->input('contacts');
        $owner->owner_address = $request->input('address');
        $owner->save();

        return redirect()->route('owners')->with('success', 'Property Owner Successfully Added to Our System');
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
        $owners = Owner::find($id);
        return view('admin.owners.editowners')->with('owners' , $owners);
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
        $owners = Owner::find($id);
        $owners->owner_name = $request->input('name');
        $owners->owner_email = $request->input('email');
        $owners->owner_contacts = $request->input('contacts');
        $owners->owner_address = $request->input('address');
        $owners->update();
        
        return redirect()->route('owners')->with('success', 'Record Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $owners = Owner::find($id);
        $owners->delete();

        return redirect()->route('owners')->with('success', 'Record Deleted');
    }
}
