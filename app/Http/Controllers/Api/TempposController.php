<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Temppos;
use App\Http\Resources\TempposResource;
use App\Http\Controllers\Controller;

class TempposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temppos=Temppos::all();
        return  TempposResource::collection($temppos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $temppos=new Temppos;
        $temppos->category = $request->input('category');
        $temppos->subcategory = $request->input('subcategory');
        $temppos->item = $request->input('item');
        $temppos->unitprice = $request->input('unitprice');
        $temppos->totalprice = $request->input('totalprice');
        $temppos->save();

        return new TempposResource($temppos);        

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
