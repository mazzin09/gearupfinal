@extends('layouts.app')
@section('content')
<div class="content-list d-flex">
    <div class="content-left col-md-8">
        <div class="card mb-3">
            <div class="card-body row">
                   <div class="col-md-12">
                       <form method="POST" action="{{route('purchase.store')}}">
                       @csrf
                       <h2>Update Inventory</h2>
                       <div class="form-group">
                       <label>Category</label>
                       <select name="category_id" class="form-control" id="mainCategory">
                          @foreach ($categories as $category)
                          <option value="{{$category->id }}">{{$category->name}}</option>
                          @endforeach
                       </select>
                       </div>
                       <div class="form-group">
                       <label>Sub-Category</label>
                       <select name="subcategory_id" class="form-control" id="child_category">
                           <option value="" class="subcategory"></option>
                       </select>
                       </div>
                       <div class="form-group">
                       <label>Item</label>
                       <select name="item_id" class="form-control" id="item">
                       <option value="" class="item"></option>
                       </select>
                       </div>
                       <div class="form-group">
                       <label>Size</label>
                       <select name="size" class="form-control">
                          <option>S</option>
                          <option>M</option>
                          <option>L</option>
                          <option>XL</option>
                          <option>XXL</option>
                          <option>XXXL</option>
                       </select>
                       </div>
                       <div class="form-group">
                       <label>Color</label>
                       <input type="text" name="color" placeholder="Color" class="form-control" >
                       </div>
                       <div class="form-group">
                       <label>Quantity</label>
                       <input type="text" name="quantity" placeholder="Quantity" class="form-control" >
                       </div>
                       <div class="form-group">
                       <label> Price</label>
                       <input type="text" name="unitprice" placeholder="Price" class="form-control" >
                       </div>
                       <div class="form-group">
                       <input type="Submit" name="submit" class="btn btn-primary" value="submit" placeholder="Submit">
                       </div>
                       </form>
                   </div>
            </div>  
        </div>
    </div> 
</div>
  @endsection
