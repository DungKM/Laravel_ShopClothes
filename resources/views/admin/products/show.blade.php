@extends('admin.layouts.app')
@section('title', 'Product show ' . $product->name)
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-content">
                    <h1>Show Products {{ $product->name }} - {{ $product->id }}</h1>


                    <div class="form-group">
                        <label for="">Name : {{ $product->name }}</label>

                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="">Avata</label>
                        </div>
                        <div class="col-sm-4">
                            <img src="{{ $product->images ? asset('upload/' . $product->images->first()->url) : 'upload/default.png' }}"
                                alt="" id="show-image">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Price : {{ $product->price }}</label>

                    </div>

                    <div class="form-group">
                        <label for="">Sale : {{ $product->sale }}</label>

                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <div>
                            {{ $product->description }}
                        </div>

                    </div>
                    <div>
                        <label for="">Size</label>
                        @if ($product->details->count() > 0)

                            @foreach ($product->details as $detail)
                                <p>Size : {{ $detail->size }} - quantity : {{ $detail->quantity }}</p>
                            @endforeach
                        @else
                            <p>Sản phẩm chưa nhập size</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="btn-group bootstrap-select">
                            <label for="">Category</label>
                            @foreach ($product->categories as $item)
                                <p>{{ $item->name }}</p>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
