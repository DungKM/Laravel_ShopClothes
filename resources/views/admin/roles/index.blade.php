@extends('admin.layouts.app')
@section('title', 'Roles')
@section('content')
    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    <h1>
        Roles list
    </h1>
    <div>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="card">
        <div class="">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">displayName</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr class="">
                            <td scope="row">{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td class="row">
                                <a href="{{route('roles.edit', $role->id)}}" class="btn btn-warning col-xs-2">Edit</a>
                                <form class="col-xs-2" action="{{route('roles.destroy', $role->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>{{ $roles->links() }}</div>
        </div>
    </div>
@endsection
