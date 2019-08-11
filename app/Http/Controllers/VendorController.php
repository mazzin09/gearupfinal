<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('vendor.index')->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.create');
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
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'contactno' => 'required',
            'type' => 'required',
            'country' => 'required'
        ]);

       
        $vendor = new Vendor;
    
        $vendor->name = $request->input('name');
        $vendor->email = $request->input('email');
        $vendor->website = $request->input('website');
        $vendor->contactno = $request->input('contactno');
        $vendor->type = $request->input('type');
        $vendor->country = $request->input('country');
        $vendor->save();

        return redirect(route('vendor.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = Vendor::find($id);
        return view('vendor.show')->with('vendor', $vendor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return view('vendor.edit')->with('vendor', $vendor);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'contactno' => 'required',
            'type' => 'required',
            'country' => 'required'
        ]);

        $vendor = Vendor::find($id);
        
        $vendor->name = $request->input('name');
        $vendor->email = $request->input('email');
        $vendor->website = $request->input('website');
        $vendor->contactno = $request->input('contactno');
        $vendor->type = $request->input('type');
        $vendor->country = $request->input('country');
        $vendor->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();
    }
}
