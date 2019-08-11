@extends('layouts.app')
@section('content')
<div class="content-header d-flex justify-content-between mb-2">
    <div class="header-right">
        <h2>Sub Category</h2>
    </div>
    <div class="header-left">
            <a href="{{ route('subcategory.create') }}" class="btn btn-primary">+ New SubCategory</a>

    </div>
</div>
<div class="content-list card p-3">
    <table class="table table-sm">
        <thead class="thead-light">
            <td>Category</td>
            <td>Sub Category</td>
            <td colspan="2"></td>
        </thead>
        @foreach($subcategories as $subcategory)
            <tbody>
                <tr class="clickable-row" data-href="{{ route('subcategory.edit', $subcategory->id ) }}">
                    <td>{{$subcategory->category->name}}</td>
                    <td>{{$subcategory->name}}</td>
                    <td>
                        <a href="{{ route('subcategory.edit', $subcategory->id)}}"><i class="far fa-edit"></i></a>
                    </td>
                    <td>
                            <form action="{{route('subcategory.destroy', $subcategory->id)}}" method="POST">
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
