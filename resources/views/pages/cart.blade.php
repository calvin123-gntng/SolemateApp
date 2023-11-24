@extends('includes.main')
@section('content')
@include('layouts/navbar')
    <div class="px-8 py-10 xl:px-20 lg:py-16">
        <h1 class="font-medium text-2xl lg:text-[40px] mb-5 lg:mb-[90px] text-center">Your Cart</h1>
        <div class="w-full">
            <h2 class="font-medium text-2xl lg:text-[40px] mb-5 lg:mb-[35px]">Your Items</h2>
            <form action="{{route('checkout')}}" method="POST" class="flex flex-col items-start justify-between w-full lg:flex-row">
                @csrf
                <div class="w-full">
                    {{-- <div class="flex items-center justify-between w-full lg:w-[520px] xl:w-[614px] lg:h-[164px] mb-[35px]">
                        <div>
                            <div class="flex items-center mb-3 gap-x-3">
                                <img src="{{asset('assets/images/shoes.png')}}" alt="shoe" class="w-[100px] h-[100px] md:w-[150px] md:h-[150px] lg:w-[213px] lg:h-[164px] object-cover bg-secondary">
                                <div>
                                    <h3 class="font-medium text-xl lg:text-[40px] cursor-pointer mb-[4px]">Shoe Name</h3>
                                    <p class="text-black text-opacity-50 font-medium text-base lg:text-[20px]">Color: Black</p>
                                    <p class="text-black text-opacity-50 font-medium text-base lg:text-[20px] mb-5">Size: 43</p>
                                    <div class="items-center hidden gap-x-10 md:flex">
                                        <div class="flex items-center gap-x-4 text-black text-opacity-50 font-medium text-base lg:text-[20px]">
                                            <button id="btn-decrease-qty-buyer" type="button" >-</button>
                                            <input id="qty-buyer" name="qty_buyer" type="text" class="w-[35px]">
                                            <button id="btn-increase-qty-buyer" type="button">+</button>
                                        </div>
                                        <p class="font-medium text-base lg:text-[20px]">Rp. xxx xxx xxx</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center md:hidden gap-x-10">
                                <div class="flex items-center gap-x-4 text-black text-opacity-50 font-medium text-base lg:text-[20px]">
                                    <button id="btn-decrease-qty-buyer" type="button" >-</button>
                                    <input id="qty-buyer" name="qty_buyer" type="text" class="w-[35px]">
                                    <button id="btn-increase-qty-buyer" type="button">+</button>
                                </div>
                                <p class="font-medium text-base lg:text-[20px]">Rp. xxx xxx xxx</p>
                            </div>
                        </div>
                        <label class="relative block cursor-pointer">
                            <input type="checkbox" class="appearance-none checked:bg-secondary w-[40px] h-[40px] lg:w-[50px] lg:h-[50px] rounded-xl lg:rounded-[18px] border text-black hover:bg-secondary"/>
                            <p class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 font-light text-lg lg:text-[30px]">
                                <img src="{{asset('assets/images/check.png')}}" alt="check">
                            </p>
                        </label>
                    </div> --}}
                    @forelse($collection as $i => $item)
                        <div class="flex items-center justify-between w-full lg:w-[520px] xl:w-[614px] lg:h-[164px] mb-[35px]">
                            <div>
                                <div class="flex items-center mb-3 gap-x-3">
                                    <img src="{{asset($item->product->photo)}}" alt="shoe" class="w-[100px] h-[100px] md:w-[150px] md:h-[150px] lg:w-[213px] lg:h-[164px] object-cover bg-secondary">
                                    <div>
                                        <a href="{{route('buyer', $item->product->id)}}">
                                            <h3 class="font-medium text-xl lg:text-[40px] cursor-pointer mb-[4px]">{{ ucwords($item->product->name) }}</h3>
                                            {{-- <p class="text-black text-opacity-50 font-medium text-base lg:text-[20px]">Color: Black</p> --}}
                                            {{-- <p class="text-black text-opacity-50 font-medium text-base lg:text-[20px] mb-5">Size: 43</p> --}}
                                            <div class="items-center hidden gap-x-10 md:flex">
                                                <div class="flex items-center gap-x-4 text-black text-opacity-50 font-medium text-base lg:text-[20px]">
                                                    {{-- <button>-</button> --}}
                                                    Qty : <input type="text" class="w-[35px]" value="{{$item->quantity}}" disabled>
                                                    {{-- <button>+</button> --}}
                                                </div>
                                                <p class="font-medium text-base lg:text-[20px]">Rp. {{ number_format($item->product->price) }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center md:hidden gap-x-10">
                                    <div class="flex items-center gap-x-4 text-black text-opacity-50 font-medium text-base lg:text-[20px]">
                                        {{-- <button>-</button> --}}
                                        <input type="text" class="w-[35px]" value="{{$item->quantity}}" disabled>
                                        {{-- <button>+</button> --}}
                                    </div>
                                    <p class="font-medium text-base lg:text-[20px]">Rp. {{ number_format($item->product->price) }}</p>
                                </div>
                            </div>
                            {{-- <label class="relative block cursor-pointer">
                                <input type="checkbox" class="appearance-none checked:bg-secondary w-[40px] h-[40px] lg:w-[50px] lg:h-[50px] rounded-xl lg:rounded-[18px] border text-black hover:bg-secondary"/>
                                <p class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 font-light text-lg lg:text-[30px]">
                                    <img src="{{asset('assets/images/check.png')}}" alt="check">
                                </p>
                            </label> --}}
                        </div>
                    @php
                        $quantity += $item->quantity;
                        $price += $item->product->price * $item->quantity;
                        $tax += ($item->product->price * $item->quantity) / 10;
                        $total = $price + $tax;
                    @endphp
                    @empty
                    <p class="text-orange">No Items In Your Cart</p>
                    @endforelse
                </div>
                <div class="w-full mt-5 lg:w-auto lg:mt-0">
                    <div class="w-full lg:w-[400px] xl:w-[490px] lg:min-h-[316px] bg-secondary border border-black mb-10 lg:mb-[62px]">
                        <div class="p-3">
                            <h5 class="font-medium text-2xl lg:text-[36px] mb-3 lg:mb-[18px] leading-none text-center">Order Summary</h5>
                            <div class="font-medium text-lg lg:text-[24px] p-5">
                                <p class="mb-3 lg:mb-5">Order Summary : {{ count($collection) }} Products</p>
                                <p class="mb-3 lg:mb-5">Total Quantity :{{ $quantity }}</p>
                                <p>Subtotal: Rp. {{ number_format($price) }}</p>
                                <p>Tax (10%) : Rp. {{number_format($tax)}}</p>
                                <p>Total: Rp. {{ number_format($total)}}</p>
                            </div>
                        </div>
                        <input type="hidden" name="grandtotal" value="{{$total}}">
                        {{-- <div class="flex items-center justify-between p-5 border-t border-t-black font-medium text-lg lg:text-[24px]">
                            <p>Coupon Code</p>
                            <button type="button" class="block">></button>
                        </div> --}}
                    </div>
                    @if(count($collection) > 0)
                        <button type="submit" class="w-full grid place-items-center lg:w-[400px] xl:w-[490px] h-[60px] bg-secondary font-medium text-2xl lg:text-[36px] border border-black hover:brightness-95">Order Now</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endSection()
