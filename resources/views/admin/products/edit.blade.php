@extends('admin.layouts.app')
@section('title', 'Product Edit')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-content">
                    <h1>Edit Products</h1>
                    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name') ?? $product->name }}">
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
                                <img src="{{ $product->images ? asset('upload/' . $product->images->first()->url) : 'upload/default.png' }}" alt="" id="show-image">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control"
                                value="{{ old('price') ?? $product->price }}">
                            @error('price')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Sale</label>
                            <input type="text" name="sale" class="form-control"
                                value="{{ old('sale') ?? $product->sale }}">
                            @error('sale')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" id="description">{{ old('description') ?? $product->description }}</textarea>
                            @error('description')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <input type="hidden" id="inputSize" name='sizes'>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary clickmodal" data-bs-toggle="modal"
                            data-bs-target="#AddSizeModal">
                            Add size
                        </button>

                        <!-- Modal -->
                        <div class="modal" id="AddSizeModal" tabindex="-1" aria-labelledby="AddSizeModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content p-3">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="AddSizeModalLabel">Add size</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="AddSizeModalBody">

                                    </div>
                                    <div class="mt-3">
                                        <button type="button" class="btn  btn-primary btn-add-size">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="btn-group bootstrap-select">
                                <label for="">Category</label>
                                <select class="selectpicker" name="category_ids[]" multiple>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $product->categories->contains('id', $item->id) ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_ids')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
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
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
        integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('plugin/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/assets/product/product.js') }}"></script>
    <script>
        let sizes = @json($product->details)
    </script>
    
@endsection
