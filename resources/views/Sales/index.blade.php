@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="button-group">
                <a href="{{route('sales.create')}}" class="btn btn-link ">Add New Sale</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Sales Price</th>
                    <th>Sales Quantity</th>
                    <th>Remaining Quantity</th>
                    <th>Actual Price</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td>{{$sale->id}}</td>
                        <td>{{$sale->name}}</td>
                        <td>{{$sale->sale_amount}}</td>
                        <td>{{$sale->sale_quantity}}</td>
                        <td>{{$sale->quantity}}</td>
                        <td>{{$sale->price}}</td>
                        <td>{{$sale->sale_date}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
