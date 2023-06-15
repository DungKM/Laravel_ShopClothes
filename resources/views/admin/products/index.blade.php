@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')

    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    <h1>
        Products list
    </h1>
    <div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="card">
        <div class="">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Avata</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sale</th>
                        {{-- <th scope="col">Category</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr class="">
                            <td scope="row">{{ $item->id }}</td>
                            <td><img src="{{ $item->images->count() > 0 ? asset('upload/' . $item->images->first()->url) : 'upload/default.png' }}"
                                    alt="" width="100" height="100"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->sale }}</td>

                            <td class="row">
                                @can('update-product')
                                    <a href="{{ route('products.edit', $item->id) }}" class="btn btn-warning col-lg-4">Edit</a>
                                @endcan
                                @can('show-product')
                                    <a href="{{ route('products.show', $item->id) }}" class="btn btn-info col-lg-4">Show</a>
                                @endcan
                                @can('delete-product')
                                    <div class="col-lg-4">
                                        <form action="{{ route('products.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>{{ $products->links() }}</div>
        </div>

    </div>

@endsection
