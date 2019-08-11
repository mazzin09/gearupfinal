<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Category;
use App\Subcategory;
use App\Item;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();
        return view('purchase.index')->with('purchases', $purchases);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $items = Item::all();
        return view('purchase.create')->with(compact('categories', 'subcategories','items'));
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

            'size' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'unitprice' => 'required'
        ]);

       
        $purchase = new Purchase;
      
        $purchase->category_id = $request->input('category_id');
        $purchase->subcategory_id = $request->input('subcategory_id');
        $purchase->item_id = $request->input('item_id');
        $purchase->size = $request->input('size');
        $purchase->color = $request->input('color');
        $purchase->quantity = $request->input('quantity');
        $purchase->unitprice = $request->input('unitprice');
        $purchase->save();

        return redirect(route('purchase.index'))->with('purchases', $purchase);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = Purchase::find($id);
        return view('purchase.show')->with('purchase', $purchase);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase = Purchase::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $items = Item::all();
        return view('purchase.edit')->with(compact('purchase','categories', 'subcategories','items'));
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
            'size' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'unitprice' => 'required'
        ]);

        $purchase = Purchase::find($id);
        
        $purchase->category_id = $request->input('category_id');
        $purchase->subcategory_id = $request->input('subcategory_id');
        $purchase->item_id = $request->input('item_id');
        $purchase->size = $request->input('size');
        $purchase->color = $request->input('color');
        $purchase->quantity = $request->input('quantity');
        $purchase->unitprice = $request->input('unitprice');
        $purchase->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete();
    }
}
