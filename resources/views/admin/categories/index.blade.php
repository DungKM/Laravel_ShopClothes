@extends('admin.layouts.app')
@section('title', 'Category')
@section('content')

    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    <h1>
        Category list
    </h1>
    <div>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="card">
        <div class="">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">parent</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr class="">
                            <td scope="row">{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->parent_name }}</td>
                            <td class="row">
                                {{-- @can('update-category') --}}
                                    <div class="col-lg-2">
                                        <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    </div>
                                {{-- @endcan --}}
                                {{-- @can('delete-category') --}}
                                    <form class="col-lg-2" action="{{ route('categories.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                {{-- @endcan --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>{{ $categories->links() }}</div>
        </div>

    </div>

@endsection
