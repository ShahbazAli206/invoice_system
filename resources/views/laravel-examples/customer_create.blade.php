@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>All Users (Customer) here!</strong>
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="container">
                <div class="row mb-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Basic Info</h5>
                    </div>
                    <form action="{{ route('adminpanel.customer_store') }}" method="post" role="form text-left" enctype="multipart/form-data"  style="background-color: rgb(199, 187, 208)">
                        @csrf
                    <div class="card-body" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-name" class="form-control-label h4"> {{ __('Full Name') }}</label>
                                    <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                        <input class="form-control" style=" color: rgb(1, 0, 0); font-size: 20px;" type="text" placeholder="Name" id="user-name" name="name">
                                            @error('name')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label h4">{{ __('Email') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" style=" color: rgb(1, 0, 0); font-size: 16px;" type="email" placeholder="@example.com" id="user-email" name="email">
                                            @error('email')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label h4">{{ __('Phone Number') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" style=" color: rgb(1, 0, 0); font-size: 16px;"  type="text" placeholder="03xxxxxxxxx" id="user-ph_no" name="phone">
                                            @error('email')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label h4">{{ __('Primary Currency')  }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <select name="Currency" id="Currency" class="form-control style="color: rgb(0, 0, 0); font-size: 18px;" @error('category_id') is-invalid @enderror">
                                            <option value="null" style="color: rgb(0, 0, 0); font-size: 18px;">Select Your Currency</option>
                                            <option value="pkr"style="color: rgb(0, 0, 0); font-size: 18px;">PKR - Pakistani Rupee</option>
                                            <option value="usd" style="color: rgb(0, 0, 0); font-size: 18px;">USD- US Dollar</option>
                                            <option value="eur"style="color: rgb(0, 0, 0); font-size: 18px;">EUR - Euro</option>
                                                @error('Currency')
                                              <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror                               
                                        </select>
                                    </div>
                                </div>
                            </div>

                            
                           
                            <div class="d-flex justify-content">
                                <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Customer' }}</button>
                            </div>
                    </div>
    
                </form>
        
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
 
@endsection