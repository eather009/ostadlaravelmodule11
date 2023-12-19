@extends('layouts.app')
@section('content')
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Today sales
                    </h2>
                </div>
                <div class="card-body text-center font-bold">
                    {{$saleSummaryToday}}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Yesterday sales
                    </h2>
                </div>
                <div class="card-body text-center font-bold">
                    {{$saleSummaryYesterday}}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        This Months sales
                    </h2>
                </div>
                <div class="card-body text-center font-bold">
                    {{$saleSummaryThisMonth}}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Last Months sales
                    </h2>
                </div>
                <div class="card-body text-center font-bold">
                    {{$saleSummaryLastMonth}}
                </div>
            </div>
        </div>
    </div>
@endsection
