@extends('layouts.app')
@section('content')
<div class="content-header d-flex justify-content-between mb-2">
    <div class="header-right">
        <h2>Category</h2>
    </div>
    <div class="header-left">
            <a href="{{ route('category.create') }}" class="btn btn-primary">+ New Category</a>

    </div>
</div>
<div class="content-list card p-3">
    <table class="table table-sm">
        <thead class="thead-light">
            <td>Name</td>
            <td colspan="2"></td>
        </thead>
        @foreach($categories as $category)
            <tbody>
                <tr class="clickable-row" data-href="{{ route('category.edit', $category->id ) }}">
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{ route('category.edit', $category->id)}}"><i class="far fa-edit"></i></a>
                    </td>
                    <td>
                            <form action="{{route('category.destroy', $category->id)}}" method="POST">
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
