@extends('admin.layouts.app')
@section('title', 'Roles Edit' . $role->name)
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-content">
                    <h1>Edit Role</h1>
                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name') ?? $role->name }}">
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Display Name</label>
                            <input type="text" name="display_name" class="form-control"
                                value="{{ old('display_name') ?? $role->display_name }}">
                            @error('display_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">

                            <div class="btn-group bootstrap-select">
                                <div class="mb-3">
                                    <label for="" class="form-label">City</label>
                                    <select class="selectpicker"  name="group" value={{ $role->group }}>
                                        <option value="system">System</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
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
                                                    {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
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
