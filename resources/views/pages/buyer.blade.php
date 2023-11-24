@extends('includes.main')
@section('content')
    @include('layouts.navbar')
    <div class="flex flex-col items-center justify-center w-full h-full gap-10 p-5 mb-48 lg:items-start lg:mb-12 md:flex-row lg:p-14 xl:gap-28">
        <div class="lg:w-1/2">
            <img src="{{asset($product->photo)}}" alt="shoe" class="w-[350px] h-[350px] lg:w-[420px] lg:h-[420px] xl:w-[605px] xl:h-[509px] object-cover mb-3">
            <div class="lg:p-4">
                <span class="inline-block mb-5 text-lg border-b-2 border-orange">{{ $product->name }}</span>
                <p class="text-base">{{ $product->description }}</p>
            </div>
        </div>
        <div class="p-5 lg:w-1/2">
            <h2 class="font-medium text-4xl lg:text-[50px] mb-[15px]">{{ ucwords($product->name) }}</h2>
            <h3 class="font-light text-3xl lg:text-[45px] text-[#ccc] mb-[27px]">IDR. {{number_format($product->price)}}</h3>
            <h4 class="font-light text-3xl lg:text-[45px] text-[#00FF94] mb-[27px]">Stock : {{$product->stock}}</h4>
            <form action="{{route('cart')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                {{-- <div class="flex flex-wrap items-center gap-5 lg:gap-[39px] mb-[26px]">
                    <p class="font-light text-xl lg:text-[30px] text-[#ccc]">size</p>
                    <div class="flex items-center justify-start gap-[20px]">
                        @foreach (array(41,42,43,45) as $item)
                            <label class="relative cursor-pointer">
                                <input type="radio" name="size_buyer" class="appearance-none checked:bg-secondary w-[60px] h-[44px] lg:w-[100px] lg:h-[61px] rounded-[8px] border border-black border-opacity-50 text-black hover:bg-secondary"/>
                                <p class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 font-light text-lg lg:text-[30px]">{{$item}}</p>
                            </label>
                        @endforeach
                    </div>
                </div> --}}
                {{-- <div class="flex flex-wrap items-center gap-5 lg:gap-[39px] mb-[26px]">
                    <p class="font-light text-xl lg:text-[30px] text-[#ccc]">color</p>
                    <div class="flex items-center justify-start gap-[20px]">
                        @php
                            $colors = array(
                                    'red' => '#BE3144',
                                    'blue' => '#1640D6',
                                    'green' => '#1FFF13',
                                    'orange' => '#FF6C22'
                                )
                        @endphp
                        @foreach ( $colors as $color => $value)
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="color_buyer" class="appearance-none checked:bg-[{{$value}}] w-[60px] h-[44px] lg:w-[100px] lg:h-[61px] rounded-[8px] border border-[{{$value}}] border-opacity-50 text-black group-hover:bg-[{{$value}}]" data-color="{{$color}}"/>
                                <p id="colorText" class="absolute text-lg font-light capitalize -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 lg:text-2xl group-hover:text-white">
                                    {{$color}}
                                </p>
                            </label>
                        @endforeach
                    </div>
                </div> --}}
                <div class="flex items-center gap-[22px] mb-[33px]">
                    <button id="btn-decrease-qty-buyer" type="button" class="fill-white bg-secondary rounded-[20px] w-[55px] h-[55px] lg:w-[60px] lg:h-[60px] grid place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" viewBox="0 0 24 24"><path d="M7 11h10v2H7z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
                    </button>
                    <input id="qty-buyer" type="number" name="qty_buyer" class="block font-light max-w-[70px] h-auto text-3xl lg:text-[40px]"/>
                    <button id="btn-increase-qty-buyer" type="button" class="fill-white bg-[#00FF94] rounded-[20px] w-[55px] h-[55px] lg:w-[60px] lg:h-[60px] grid place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" viewBox="0 0 24 24"><path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
                    </button>
                </div>
                @if ($errors->has('message'))
                    <small class="text-[#BE3144]">{{ $errors->first('message') }}</small>
                @endif
                @if ($errors->has('quantity'))
                    <small class="text-[#BE3144]">{{ $errors->first('quantity') }}</small>
                @endif
                <button type="submit" class="grid place-items-center bg-orange w-[300px] h-[55px] lg:w-[439px] lg:h-[70px] rounded-[10px] text-center font-medium text-xl lg:text-[30px] text-white">
                    Add to cart
                </button>
            </form>
        </div>
    </div>

<script>
    const radios = document.querySelectorAll('input[name="color_buyer"]');
    const colorTexts = document.querySelectorAll('#colorText');

    const changeColorWhenInputChecked = (radio) => {
        if(radio.checked) {
            const colorName = radio.getAttribute('data-color');
            colorTexts.forEach((colorText) => {
                if(colorName.toLowerCase() == colorText.innerText.toLowerCase()){
                    colorText.classList.add('text-white');
                } else {
                    colorText.classList.remove('text-white');
                }
            })
        }
    }
    radios.forEach((radio) => {
        radio.addEventListener('change', () => changeColorWhenInputChecked(radio))
    })
</script>
@endSection
