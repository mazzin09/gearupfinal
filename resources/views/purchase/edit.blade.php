@extends('layouts.app')
@section('content')


<div class="content-list d-flex">
    <div class="content-left col-md-8">
        <div class="card mb-3">
            <div class="card-body row">
                   <div class="col-md-12">
                       <form method="POST" action="{{route('purchase.update' , $purchase->id)}}">
                       @csrf
                       @method('PUT')
                       <h2>Item Details</h2>
                       <div class="form-group">
                       <label>Category</label>
                       <select name="category_id" class="form-control">
                          @foreach ($categories as $category)
                          <option value="{{$category->id }}">{{$category->name}}</option>
                          @endforeach
                       </select>
                       </div>
                       <div class="form-group">
                       <label>Sub Category</label>
                       <select name="subcategory_id" class="form-control">
                          @foreach ($subcategories as $subcategory)
                          <option value="{{$subcategory->id }}">{{$subcategory->name}}</option>
                          @endforeach
                       </select>
                       </div>
                       <div class="form-group">
                       <label>Item </label>
                       <select name="item_id" class="form-control">
                          @foreach ($items as $item)
                          <option value="{{$item->id }}">{{$item->name}}</option>
                          @endforeach
                       </select>
                       </div>                        
                       <div class="form-group">
                         <label>Size </label>
                         <select name="size">
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
                       <input type="text" name="color" value="{{$purchase->color}}"class="form-control" >
                       </div>
                       <div class="form-group">
                       <label>Quantity</label>
                       <input type="text" name="quantity" value="{{$purchase->quantity}}"class="form-control" >
                       </div>     
                       <div class="form-group">
                       <label> Price </label>
                       <input type="text" name="price" value="{{$purchase->unitprice}}"class="form-control" >
                       </div>                        
                       <div class="form-group">
                       <input type="Submit" name="submit" class="btn btn-primary" value="Update" >
                       </div>
                       </form>
                   </div>
            </div>
            
        </div>
    </div>
</div>

 @endsection