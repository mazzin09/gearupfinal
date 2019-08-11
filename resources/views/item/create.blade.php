@extends('layouts.app')
@section('content')

<div class="content-list d-flex">
    <div class="content-left col-md-8">
        <div class="card mb-3">
            <div class="card-body row">
                   <div class="col-md-12">
                       <form method="POST" action="{{route('item.store')}}" enctype="multipart/form-data">
                       @csrf
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
                       <label>Sub-Category</label>
                       <select name="subcategory_id" class="form-control">
                          @foreach ($subcategories as $subcategory)
                          <option value="{{$subcategory->id }}">{{$subcategory->name}}</option>
                          @endforeach
                       </select>
                       </div>
                       <div class="form-group">
                       <label>Name</label>
                       <input type="text" name="name" placeholder="Name" class="form-control" >
                       </div>
                       <div class="form-group">
                       <label>Price</label>
                       <input type="text" name="price" placeholder="Price" class="form-control" >
                       </div>
                       <div class="form-group">
                       <label>Cover Image</label>
                       <input type="file" name="cover" placeholder="Image" class="form-control" >
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