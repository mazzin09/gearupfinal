@extends('layouts.app')
@section('content')

<div class="content-header d-flex justify-content-between mb-2">
    <div class="header-right">
        <h2>Item</h2>
    </div>
    <div class="header-left">
            <a href="{{ route('purchase.create') }}" class="btn btn-primary">+ New Purchase</a>

    </div>
</div>
<div class="content-list card p-4">
    <table class="table table-sm">
        <thead class="thead-light">
            <td>Category</td>
            <td>Sub Category</td>
            <td>Item</td>
            <td>Size</td>
            <td>Color</td>
            <td>Quantity</td>
            <td>Price</td>
            <td colspan="2"></td>
        </thead>
        @foreach($purchases as $purchase)
            <tbody>
                <tr class="clickable-row" data-href="{{ route('purchase.edit', $purchase->id) }}">
                    <td>{{$purchase->category}}</td>
                    <td>{{$purchase->subcategory}}</td>
                    <td>{{$purchase->item}}</td>
                    <td>{{$purchase->size}}</td>
                    <td>{{$purchase->color}}</td>
                    <td>{{$purchase->quantity}}</td>
                    <td>{{$purchase->unitprice}}</td>
                    <td>
                        <a href="{{ route('purchase.edit', $purchase->id)}}"><i class="far fa-edit"></i></a>
                    </td>
                    <td>
                            <form action="{{route('purchase.destroy', $purchase->id)}}" method="POST">
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