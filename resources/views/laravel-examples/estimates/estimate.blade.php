@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>All Items are here!</strong>
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4 p-3">
                <div class="card-header pb-0" style="background-color: rgb(248, 252, 251)">
                    <div class="mb-3 d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0" style="font-size: 24px"> </h5>
                        </div>
                        <a href="{{route('adminpanel.Estimates.create')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp;Add New Estimate</a>
                    </div>
                </div>
                <div class="card-header pb-0">
                    <div class="mb-3 d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Items</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id = 'myTable'>
                            <thead>
                                <tr>
                                   
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        DATE
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NUMBER
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        CUSTOMER
                                    </th>
                                   
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        STATUS
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        TOTAL
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prroducts as $product)
                                <tr>
                                    
                                    
                                    <td class="text-center">
                                        {{\Carbon\Carbon::parse($product->date)->format('d/m/Y')}}
                                    </td>
                                    
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$product->estimate_no}}</p>
                                    </td>
                                    <td  class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$product->customer_name}}</p>

                                    </td>

                                    <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{$product->status}}</p>
                                    </td>

                                    <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{$product->total}}</p>
                                    </td>

                                    <td class="text-center">
                                        ...
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection