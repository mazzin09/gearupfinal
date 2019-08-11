<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('sale.index')->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sale.create');
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
            'category' => 'required',
            'subcategory' => 'required',
            'item' => 'required',
            'quantity' => 'required',
            'unitprice' => 'required',
            'totalprice' => 'required'
        ]);

       
        $sale = new Sale;
    
        $sale->category = $request->input('category');
        $sale->subcategory = $request->input('subcategory');
        $sale->item = $request->input('item');
        $sale->quantity = $request->input('quantity');
        $sale->unitprice = $request->input('unitprice');
        $sale->totalprice = $request->input('totalprice');
        $sale->save();

        return view('sale.index')->with('sales', $sale);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::find($id);
        return view('sale.show')->with('sale', $sale);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::find($id);
        return view('sale.edit')->with('sale', $sale);
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
            'category' => 'required',
            'subcategory' => 'required',
            'item' => 'required',
            'quantity' => 'required',
            'unitprice' => 'required',
            'totalprice' => 'required'
        ]);

        $sale = Sale::find($id);
        
        $sale->category = $request->input('category');
        $sale->subcategory = $request->input('subcategory');
        $sale->item = $request->input('item');
        $sale->quantity = $request->input('quantity');
        $sale->unitprice = $request->input('unitprice');
        $sale->totalprice = $request->input('totalprice');
        $sale->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::find($id);
        $sale->delete();
    }
}
