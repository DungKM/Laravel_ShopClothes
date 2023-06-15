@extends('admin.layouts.app')
@section('title', 'Coupon Edit ' . $coupon->name)
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-content">
                    <h1>Edit Coupon</h1>
                    <form action="{{ route('coupons.update', $coupon->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name') ?? $coupon->name }}" style="text-transform: uppercase">
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Value</label>
                            <input type="number" name="value" class="form-control"
                                value="{{ old('value') ?? $coupon->value }}">
                            @error('value')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Type</label>
                            <div class="btn-group bootstrap-select">
                                <select class="selectpicker" data-style="btn btn-danger btn-block" name="type"
                                    value="{{ old('type') ?? $coupon->type}}">
                                    <option value="">Select Type</option>
                                    <option value="money" {{ (old('type') ?? $coupon->type) == 'money' ? 'selected' : '' }}>Money</option>
                                </select>
                            </div>
                            @error('type')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">expery_date</label>
                            <input type="date" name="expery_date" class="form-control" value="{{ old('expery_date') ?? $coupon->expery_date }}">
                            @error('expery_date')
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
