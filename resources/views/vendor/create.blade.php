@extends('layouts.app')
@section('content')

<div class="content-list d-flex">
    <div class="content-left col-md-8">
        <div class="card mb-3">
            <div class="card-body row">
                   <div class="col-md-12">
                       <form method="POST" action="{{route('vendor.store')}}">
                       @csrf
                       <h2>Vendor Details</h2>
                       <div class="form-group">
                       <label>Name</label>
                       <input type="text" name="name" placeholder="Name" class="form-control" >
                       </div>
                       <div class="form-group">
                       <label>Email</label>
                       <input type="email" name="email" placeholder="Email" class="form-control" >
                       </div>
                       <div class="form-group">
                       <label>Website</label>
                       <input type="text" name="website" placeholder="Website" class="form-control" >
                       </div>
                       <div class="form-group">
                       <label>Contact No</label>
                       <input type="text" name="contactno" placeholder="Contact Number" class="form-control" >
                       </div>
                       <div class="form-group">
                       <label>Type</label>
                       <select name="type" class="form-control">
                          <option>National</option>
                          <option>International</option>
                       </select>
                       </div>
                       <div class="form-group">
                       <label>Country</label>
                       <input type="text" name="country" placeholder="Country" class="form-control" >
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