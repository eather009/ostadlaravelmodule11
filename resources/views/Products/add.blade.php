@extends('layouts.app')

@section('content')
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="button-group">
            <a href="{{route('products.index')}}" class="btn btn-link ">Product List</a>
        </div>
        <form class="form form-inline" method="post" action="{{route('products.create')}}">
            @csrf
            <div class="form-control-group">
                <label for="name">
                    Name:
                    <input type="text" name="name" class="form-control" placeholder="Product name"
                           @error('name') is-invalid @enderror required value="{{ old('name') }}" />
                </label>
            </div>
            <div class="form-control-group">
                <label for="quantity">
                    Quantity
                    <input type="number" name="quantity" min="0" class="form-control" placeholder="Product Quantity"
                           @error('quantity') is-invalid @enderror required value="{{ old('quantity') }}" />
                </label>
            </div>
            <div class="form-control-group">
                <label for="price">
                    Price
                    <input type="number" name="price" min="0" class="form-control" placeholder="Product Price"
                           @error('price') is-invalid @enderror required value="{{ old('price') }}" />
                </label>
            </div>
            <div class="btn-group mt-2">
                <input type="submit" value="Add" class="btn btn-outline-primary btn-outline"/>
                <input type="reset" value="Cancel" class="btn btn-outline-danger btn-outline"/>
            </div>
        </form>
    </div>
@endsection
