@extends('includes.main')
@section('content')
    @include('layouts.navbar')
    {{-- Hero section start --}}
    <section class="bg-primary w-full flex-col-reverse md:flex-row mx-auto px-5 py-8 lg:p-0 lg:h-[523px] flex items-center justify-center gap-5 lg:gap-x-[99px]">
        <div class="lg:w-[369px]">
            <h1 class="text-white w-full font-semibold text-4xl lg:text-[50px] mb-5 lg:mb-[47px] leading-tight">Special Christmas Sale</h1>
            <p class="text-white w-full h-[64px] text-lg lg:text-[20px] mb-[23px]">Makes your first day of Christmas festive and memorable</p>
            @guest
            <a href="{{route('login')}}" class="grid place-items-center bg-orange w-[150px] h-[45px] lg:w-[180px] lgl:h-[52px] rounded-[5px] text-[20px] font-semibold text-white transition active:scale-90 hover:brightness-95">Get It Now</a>
            @endguest
            @auth
            <a href="{{route('category')}}" class="grid place-items-center bg-orange w-[150px] h-[45px] lg:w-[180px] lgl:h-[52px] rounded-[5px] text-[20px] font-semibold text-white transition active:scale-90 hover:brightness-95">Get It Now</a>
            @endauth
        </div>
        <div class="w-[270px] h-[300px]">
            <img src="{{ asset('assets/images/shoes.png') }}" alt="" class="w-full h-full bg-secondary">
        </div>
    </section>
    {{-- Hero section end --}}

    {{-- Product Brand section start --}}
    <section class="lg:px-10 xl:px-[80px] lg:h-[274px] py-[38px] w-full">
        {{-- <div class="flex flex-wrap items-center justify-center px-5 md:justify-between lg:px-0">
            <a href="/product/nike">
                <img src="{{asset('assets/images/nike.png')}}" alt="nike-logo" class="w-[150px] h-[150px] lg:w-[200px] lg:h-[200px] object-cover">
            </a>
            <a href="/product/dior">
                <img src="{{asset('assets/images/dior.png')}}" alt="dior-logo" class="w-[150px] h-[150px] lg:w-[200px] lg:h-[200px] object-cover">
            </a>
            <a href="/product/balenciaga">
                <img src="{{asset('assets/images/balenciaga.png')}}" alt="balenciaga-logo" class="w-[150px] h-[150px] lg:w-[200px] lg:h-[200px] object-cover">
            </a>
            <a href="/product/adidas">
                <img src="{{asset('assets/images/adidas.png')}}" alt="adidas-logo" class="w-[150px] h-[150px] lg:w-[200px] lg:h-[200px] object-cover">
            </a>
        </div> --}}
        <div class="flex flex-wrap items-center justify-center px-5 md:justify-between lg:px-0">
            <a href="/product/nike">
                <img src="{{asset('assets/images/nike.png')}}" alt="nike-logo" class="w-[150px] h-[150px] lg:w-[200px] lg:h-[200px] object-cover">
            </a>
            <a href="/product/dior">
                <img src="{{asset('assets/images/dior.png')}}" alt="dior-logo" class="w-[150px] h-[150px] lg:w-[200px] lg:h-[200px] object-cover">
            </a>
            <a href="/product/balenciaga">
                <img src="{{asset('assets/images/balenciaga.png')}}" alt="balenciaga-logo" class="w-[150px] h-[150px] lg:w-[200px] lg:h-[200px] object-cover">
            </a>
            <a href="/product/adidas">
                <img src="{{asset('assets/images/adidas.png')}}" alt="adidas-logo" class="w-[150px] h-[150px] lg:w-[200px] lg:h-[200px] object-cover">
            </a>
        </div>
    </section>
    {{-- Product Brand section end --}}

    {{-- Product discount start --}}
    <section class="px-5 lg:px-10 xl:px-[80px] h-auto xl:h-[430px] py-[50px] bg-blue w-full">
        <div class="mb-10">
            <h2 class="font-medium text-2xl lg:text-[30px] text-[#515151]">Special Christmas</h2>
            <p class="font-light text-lg lg:text-[20px]">Shoe discounts during christmas</p>
        </div>
        <div class="flex flex-wrap lg:flex-nowrap items-center justify-center md:justify-start lg:justify-between w-full lg:h-[200px] gap-8 lg:gap-y-0 xl:gap-x-[64px]">
            {{-- <a href="{{route('buyer')}}" class="overflow-hidden "> --}}
                {{-- <img src="{{asset('assets/images/shoes.png')}}" alt="shoes" class="w-[150px] h-[150px] lg:w-[180px] lg:h-[180px] xl:w-[200px] xl:h-[200px] object-cover bg-secondary transition hover:scale-110"> --}}
            {{-- </a> --}}
            @foreach($collection as $i => $data)
            <a href="{{ route('buyer', $data->id) }}" class="overflow-hidden ">
                <img src="{{asset($data->photo)}}" alt="shoes" class="w-[150px] h-[150px] lg:w-[180px] lg:h-[180px] xl:w-[200px] xl:h-[200px] object-cover bg-secondary transition hover:scale-110">
            </a>
            @endforeach
        </div>
    </section>
    {{-- Product discount end --}}

    {{-- Our designer start --}}
    <section class="px-5 lg:px-10 xl:px-[80px] xl:h-[430px] w-full py-[60px] lg:mb-30 xl:mb-40">
        <div class="mb-10">
            <h2 class="font-medium text-2xl lg:text-[30px] text-[#515151]">Our Designers</h2>
            <p class="font-light text-lg lg:text-[20px]">The best shoes from the best designers</p>
        </div>
        <div class="xl:px-[230px] flex flex-wrap items-center justify-center md:justify-start lg:justify-center xl:justify-between w-full lg:h-[140px] gap-8">
            {{-- @for ($i = 0; $i < 5; $i++) --}}
                <a href="#" class="overflow-hidden rounded-full">
                    <img src="{{asset('assets/images/nike.png')}}" alt="shoes" class="block w-[140px] h-[140px] object-cover bg-secondary rounded-full transition hover:scale-110">
                </a>
                <a href="#" class="overflow-hidden rounded-full">
                    <img src="{{asset('assets/images/dior.png')}}" alt="shoes" class="block w-[140px] h-[140px] object-cover bg-secondary rounded-full transition hover:scale-110">
                </a>
                <a href="#" class="overflow-hidden rounded-full">
                    <img src="{{asset('assets/images/balenciaga.png')}}" alt="shoes" class="block w-[140px] h-[140px] object-cover bg-secondary rounded-full transition hover:scale-110">
                </a>
                <a href="#" class="overflow-hidden rounded-full">
                    <img src="{{asset('assets/images/adidas.png')}}" alt="shoes" class="block w-[140px] h-[140px] object-cover bg-secondary rounded-full transition hover:scale-110">
                </a>
            {{-- @endfor --}}
        </div>
    </section>
    {{-- Our designer end --}}
@endSection()
