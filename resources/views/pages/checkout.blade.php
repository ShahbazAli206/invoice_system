@extends('layouts.master')
@section('title', 'Checkout')
@section('content')
    <header class="page-header">
        <h1>Checkout</h1>
        <h3 class="cart-amount"></h3>
    </header>
   
    <main class="checkout-page" >
        <div class="container">
            <div class="checkout-form" >
                <form action="{{route('stripeCheckout')}}" id="payment-form" method="post" >
                    @csrf
                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="@error('name') has-error @enderror"  value="{{old('name') ? old('name'): auth()->user()->name--}}" style="color: black">
                        @error('name')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="@error('email') has-error @enderror" value="{{old('email') ? old('email'): auth()->user()->email}}"style="color: black" >
                        @error('email')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="@error('phone') has-error @enderror"  value="{{old('phone') ? old('phone'): auth()->user()->phone}}"style="color: black">
                        @error('phone')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- <div class="field">
                        <label for="country">Service Category</label>
                        <input type="text" id="category" name="category" class="@error('category') has-error @enderror"  value="{{old('category') ? old('category'): auth()->user()->category}}"style="color: black">

                        @error('country')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div> --}}

                    <div class="field">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="@error('address') has-error @enderror"  value="{{old('address')}}" style="color: black">
                        @error('address')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block">Submit order</button>


                </form>
            </div>
        </div>
    </main>



@endsection