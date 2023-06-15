@extends('admin.layouts.app')
@section('title', 'Users Edit')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-content">
                    <h1>Edit Users</h1>
                    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name') ?? $user->name }}">
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="">Avata</label>
                                <input type="file" name="image" accept="image/*" class="form-control" id="image-input">

                                @error('iamge')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <img src="{{ $user->images->count() > 0 ? asset('upload/' . $user->images->first()->url) : 'upload/default.png' }}"
                                    alt="" width="100" height="100" class="show-image">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>

                            <input type="number" value="{{ old('phone') ?? $user->phone }}" name="phone"
                                class="form-control">

                            @error('phone')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">

                            <div class="btn-group bootstrap-select">
                                <select class="selectpicker" name="gender" value="{{ $user->gender }}">
                                    <option value="male">Male</option>
                                    <option value="fe-male">FeMale</option>
                                </select>
                            </div>
                            @error('group')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email') ?? $user->email }}">
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control" value="{{ old('address') ?? $user->address }}"> </textarea>

                        </div>

                        <div class="form-group">
                            <label for="">Roles</label>

                            <div class="row">
                                @foreach ($roles as $groupName => $role)
                                    <div class="col-lg-4">
                                        <h4>{{ $groupName }}</h4>
                                        @foreach ($role as $item)
                                            <div class="checkbox">
                                                <input id="checkbox1" type="checkbox" value="{{ $item->id }}"
                                                    name="role_ids[]"
                                                    {{ $user->roles->contains('id', $item->id) ? 'checked' : '' }}>
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
                            <button class="btn btn-info btn-fill btn-wd" type="submit">Submit Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('script')

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(() => {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image-input").change(function() {
                readURL(this);
            });



        });
    </script>
@endsection
