<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Subcategory;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('item.index')->with('items', $items);
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
        return view('item.create')->with(compact('categories', 'subcategories'));
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
            'price' => 'required',
            'cover' => 'image|nullable|max:1999'
        ]);

        
       //Handle File Upload
       if ($request->hasFile('cover')) {
        //Get filename with the extension
        $filenameWithExt = $request->file('cover')
            ->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get just ext
        $extension = $request->file('cover')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        //Upload image
        $path = $request->file('cover')->storeAs('public/cover_images', $fileNameToStore);
        } else {
        $fileNameToStore = 'noimage.jpg';
        }
       
        $item = new Item;
        $item->category_id = $request->input('category_id');
        $item->subcategory_id = $request->input('subcategory_id');
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->cover = $fileNameToStore;
        $item->save();

        return redirect(route('item.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('item.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('item.edit')->with(compact('item', 'categories','subcategories'));
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
            'price' => 'required',
            'cover' => 'image|nullable|max:1999'
        ]);

          //Handle File Upload
          if ($request->hasFile('cover')) {
            //Get filename with the extension
            $filenameWithExt = $request->file('cover')
                ->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload image
            $path = $request->file('cover')->storeAs('public/cover_images', $fileNameToStore);
        }

        $item = Item::find($id);
        $item->category_id = $request->input('category_id');
        $item->subcategory_id = $request->input('subcategory_id');
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        if ($request->hasFile('cover')) {
            $category->cover = $fileNameToStore;
        }
        $item->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
    }
}
