@extends('layouts.app')
@section('content')

<div class="content-list d-flex">
    <div class="content-left col-md-8">
        <div class="card mb-3">
            <div class="card-body row">
                   <div class="col-md-12">
                   <form method="POST" action="{{route('category.store')}}">
                       @csrf
                       <h2>Category  Details</h2>
                       <div class="form-group">
                       <label>Name</label>
                       <input type="text" name="name" class="form-control" >
                       </div>                       
                       <div class="form-group">
                       <input type="Submit" name="submit" class="btn btn-primary" value="submit" >
                       </div>
                       </form>
                   </div>
            </div>
            
        </div>
    </div>
</div>
@endsection