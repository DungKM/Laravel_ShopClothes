@extends('admin.layouts.app')
@section('title', 'Catgeory Create')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-content">
                    <h1>Create Role</h1>
                    <form action="{{ route('categories.store') }}" method="post">
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
                            <label for="">Parent Category</label>
                            <div class="btn-group bootstrap-select">
                                <select class="selectpicker" data-style="btn btn-danger btn-block" 
                                    name="parent_id" >
                                    <option value="">Select parent category</option>
                                   @foreach ($parrentCategories as $item)
                                   <option value="{{$item->id}}" {{old('parent_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                   @endforeach
                                    
                                </select>
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
