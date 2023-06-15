@extends('admin.layouts.app')
@section('title', 'Coupons')
@section('content')

    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    <h1>
        Coupon list
    </h1>
    <div>
        <a href="{{ route('coupons.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="card">
        <div class="">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">type</th>
                        <th scope="col">value</th>
                        <th scope="col">experyDate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $item)
                        <tr class="">
                            <td scope="row">{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->value }}</td>
                            <td>{{ $item->expery_date }}</td>

                            <td class="row">
                                @can('update-coupon')
                                    <div class="col-sm-4">
                                        <a href="{{ route('coupons.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    </div>
                                @endcan
                                @can('delete-coupon')
                                <form class="col-sm-4" action="{{ route('coupons.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>{{ $coupons->links() }}</div>
        </div>
    </div>

@endsection
