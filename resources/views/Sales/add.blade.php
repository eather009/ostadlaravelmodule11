@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="button-group">
                <a href="{{route('sales.index')}}" class="btn btn-link ">Sale List</a>
            </div>
            <form class="form form-inline" method="post" action="{{route('sales.create')}}">
                @csrf
                <div class="form-control-group">
                    <label for="name">
                        Product: @error('product_id') <span class="text-danger">{{ $message }}</span> @enderror
                        <select name="product_id" class="form-control">

                            @foreach($products as $id=>$name)
                                <option value={{ $id }} {{ old('product_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="form-control-group">
                    <label for="sale_quantity">
                        Quantity: @error('sale_quantity') <span class="text-danger">{{ $message }}</span> @enderror
                        <input type="number" name="sale_quantity" min="0" class="form-control" placeholder="Sale Quantity"
                               @error('sale_quantity') is-invalid @enderror required value="{{ old('sale_quantity') }}" />
                    </label>
                </div>
                <div class="form-control-group">
                    <label for="sale_amount">
                        Price: @error('sale_amount') <span class="text-danger">{{ $message }}</span> @enderror
                        <input type="number" name="sale_amount" min="0" class="form-control" placeholder="Sale Price"
                               @error('sale_amount') is-invalid @enderror required value="{{ old('sale_amount') }}" />
                    </label>
                </div>
                <div class="form-control-group">
                    <label for="sale_date">
                        Price: @error('sale_date') <span class="text-danger">{{ $message }}</span> @enderror
                        <input type="date" name="sale_date" min="0" class="form-control" placeholder="{{date('Y/m/d')}}"
                               @error('sale_date') is-invalid @enderror required value="{{ old('sale_date') }}" />
                    </label>
                </div>
                <div class="btn-group mt-2">
                    <input type="submit" value="Add" class="btn btn-outline-primary btn-outline"/>
                    <input type="reset" value="Cancel" class="btn btn-outline-danger btn-outline"/>
                </div>
            </form>
        </div>
@endsection
