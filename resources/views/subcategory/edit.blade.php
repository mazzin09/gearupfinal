@extends('layouts.app')
@section('content')

<div class="content-list d-flex">
    <div class="content-left col-md-8">
        <div class="card mb-3">
            <div class="card-body row">
                   <div class="col-md-12">
                       <form method="POST" action="{{route('subcategory.update' , $subcategory->id)}}">
                       @csrf
                       @method('PUT')
                       <h2>Sub Category  Details</h2>
                       <div class="form-group">
                       <label>Category</label>
                       <select name="category_id" class="form-control">
                          @foreach ($categories as $category)
                          <option value="{{$category->id }}">{{$category->name}}</option>
                          @endforeach
                       </select>
                       </div>
                       <div class="form-group">
                       <label>Name</label>
                       <input type="text" name="name" value="{{$subcategory->name}}"class="form-control" >
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