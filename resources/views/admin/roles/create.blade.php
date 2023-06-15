@extends('admin.layouts.app')
@section('title', 'Roles Create')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-content">
                    <h1>Create Role</h1>
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Display Name</label>
                            <input type="text" name="display_name" class="form-control"
                                value="{{ old('display_name') }}">
                            @error('display_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">

                            <div class="btn-group bootstrap-select">
                                <select class="selectpicker" data-style="btn btn-danger btn-block" title="Single Select"
                                    name="group">
   
                                    <option value="system">System</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            @error('group')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Permisstion</label>

                            <div class="row">
                                @foreach ($permissions as $groupName => $permission)
                                    <div class="col-lg-4">
                                        <h4>{{ $groupName }}</h4>
                                        @foreach ($permission as $item)
                                            <div class="checkbox">
                                                <input id="checkbox1" type="checkbox" value="{{ $item->id }}"
                                                    name="permission_ids[]">
                                                <label for="checkbox1">
                                                    {{ $item->display_name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-info btn-fill btn-wd">Submit Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
