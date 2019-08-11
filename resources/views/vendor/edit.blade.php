@extends('layouts.app')
@section('content')

<div class="content-list d-flex">
    <div class="content-left col-md-8">
        <div class="card mb-3">
            <div class="card-body row">
                   <div class="col-md-12">
                       <form method="POST" action="{{route('vendor.update' , $vendor->id)}}">
                       @csrf
                       @method('PUT')
                       <h2>Vendor Details</h2>
                       <div class="form-group">
                       <label>Name</label>
                       <input type="text" name="name" value="{{$vendor->name}}"class="form-control" >
                       </div>     
                       <div class="form-group">
                       <label>Email</label>
                       <input type="email" name="email" value="{{$vendor->email}}"class="form-control" >
                       </div>     
                       <div class="form-group">
                       <label>Website</label>
                       <input type="text" name="website" value="{{$vendor->website}}"class="form-control" >
                       </div>     
                       <div class="form-group">
                       <label>Contact No</label>
                       <input type="text" name="contactno" value="{{$vendor->contactno}}"class="form-control" >
                       </div>        
                       <div class="form-group">
                       <label>Type </label>
                       <select name="type">
                          <option>National</option>
                          <option>International</option>
                       </select> 
                       </div>    
                       <div class="form-group">
                       <label>Country</label>
                       <input type="text" name="country" value="{{$vendor->country}}"class="form-control" >
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