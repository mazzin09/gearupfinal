@extends('layouts.app')
@section('content')
<div class="content-header d-flex justify-content-between mb-2">
    <div class="header-right">
        <h2>Vendor</h2>
    </div>
    <div class="header-left">
            <a href="{{ route('vendor.create') }}" class="btn btn-primary">+ New Vendor</a>

    </div>
</div>
<div class="content-list card p-3">
    <table class="table table-sm">
        <thead class="thead-light">
            <td>Name</td>
            <td>Email</td>
            <td>Website</td>
            <td>Contact No</td>
            <td>Type</td>
            <td>Country</td>
            <td colspan="2"></td>
        </thead>
        @foreach($vendors as $vendor)
            <tbody>
                <tr class="clickable-row" data-href="{{ route('vendor.edit', $vendor->id ) }}">
                    <td>{{$vendor->name}}</td>
                    <td>{{$vendor->email}}</td>
                    <td>{{$vendor->website}}</td>
                    <td>{{$vendor->contactno}}</td>
                    <td>{{$vendor->type}}</td>
                    <td>{{$vendor->country}}</td>
                    <td>
                        <a href="{{ route('vendor.edit', $vendor->id)}}"><i class="far fa-edit"></i></a>
                    </td>
                    <td>
                            <form action="{{route('vendor.destroy', $vendor->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="text-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                </tr>
            </tbody>
            @endforeach
    </table>
</div>


@endsection
