@extends('admin.layouts.app')
@section('title', 'Users')
@section('content')

    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    <h1>
        Users list
    </h1>
    <div>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="card">
        <div class="">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Avata</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr class="">
                            <td scope="row">{{ $item->id }}</td>
                            <td><img src="{{ $item->images->count() > 0 ? asset('upload/' . $item->images->first()->url) : 'upload/default.jpg' }}"
                                    alt="" width="100" height="100"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td class="row">
                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning col-lg-4">Edit</a>
                                <form class="col-lg-2" action="{{ route('users.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>{{ $users->links() }}</div>
        </div>

    </div>

@endsection
