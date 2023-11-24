@extends('includes.main')
@section('content')
    <div class="flex items-center justify-center w-full h-screen bg-orange">
        <div>
            <img src="{{asset('assets/images/shopping-cart.png')}}" alt="shopping-cart" class="w-[150px] h-[150px] lg:w-[200px] lg:h-[200px] mb-[18px] mx-auto">
            <h1 class="font-medium text-3xl lg:text-[50px] mb-[36px] text-center">Checkout Success!</h1>
            <div class="flex flex-wrap items-center justify-center gap-y-5 gap-x-[50px]">
                <a href="{{route('home')}}" class="grid place-items-center font-extrabold lg:text-[18px] w-[220px] h-[44px] lg:w-[247px] lg:h-[55px] bg-black rounded-[5px] shadow-lg text-white transition hover:brightness-95 active:scale-90">RETURN TO HOMEPAGE</a>
                <a href="{{route('cart')}}" class="grid place-items-center font-extrabold lg:text-[18px] w-[220px] h-[44px] lg:w-[247px] lg:h-[55px] bg-black rounded-[5px] shadow-lg text-white transition hover:brightness-95 active:scale-90">VIEW CART</a>
            </div>
        </div>
    </div>
@endSection()
