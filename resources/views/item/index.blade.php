@extends('layouts.app')
@section('content')
<div class="content-header d-flex justify-content-between mb-2">
    <div class="header-right">
        <h2>Item</h2>
    </div>
    <div class="header-left">
            <a href="{{ route('item.create') }}" class="btn btn-primary">+ New Item</a>

    </div>
</div>
<div class="content-list card p-4">
    <table class="table table-sm">
        <thead class="thead-light">
            <td>Category</td>
            <td>Sub Category</td>
            <td>Item</td>
            <td>Price</td>
            <td>Image</td>
            <td colspan="2"></td>
        </thead>
        @foreach($items as $item)
            <tbody>
                <tr class="clickable-row" data-href="{{ route('item.edit', $item->id ) }}">
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->subcategory->name}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->cover}}</td>
                    <td>
                        <a href="{{ route('item.edit', $item->id)}}"><i class="far fa-edit"></i></a>
                    </td>
                    <td>
                            <form action="{{route('item.destroy', $item->id)}}" method="POST">
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
