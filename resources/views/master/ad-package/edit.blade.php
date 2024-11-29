@extends('layouts.app')

@php
//echo "<pre>";
//print_r($package);
//echo "</pre>";
//exit;
@endphp

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
 
        <div class="card">
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                @include('layouts.flash-message')
                <!--begin::Card-->
                <div class="card card-custom">

                <form action="{{ url('edit-price')}}/1" method="post">
                    @csrf
                    <table class="table table-bordered table-checkable" id="kt_datatable">
                            <thead>
                            <tr>
                                <th title="Field #1">Ad Type</th>
                                <th title="Field #2">Package Name</th>
                                <th title="Field #3">Ad Seconds</th>
                                <th title="Field #4">Level Type</th>
                                <th title="Field #5">Price/Mth</th>
                                <th title="Field #6">3 Days</th>
                                <th title="Field #7">3 Months</th>
                                <th title="Field #8">6 Months</th>
                                <th title="Field #9">1 Year</th>
                            </tr>
                            </thead>
                    @foreach($package as $item)
                        <tr>
                            <td>
                                <span class="label label-lg label-primary label-inline">{{$item->ad_type}} </span>
                            </td>
                            <td> {{$item->package_name}}</td>
                            <td> {{$item->ad_seconds}}</td>
                            <td> {{$item->package_zone}}</td>
                            <td> 
                                <input type="number" name="price_mth" value = "{{$item->price_mth}}">
                            </td>
                            <td> {{"0"}}</td>
                            <td> {{$item->mth3_price}}</td>
                            <td> {{$item->mth6_price}}</td>
                            <td> {{$item->yr1_price}}</td>
                        </tr>
                    @endforeach
                    </table>
                
                   


                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
