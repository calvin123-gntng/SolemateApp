@extends('includes.main')
@section('content')
    <div class="px-8 xl:px-[91px]">
        <img src="{{asset('assets/images/nike.png')}}" alt="nike-logo" class="w-[150px] h-[150px] md:w-[200px] md:h-[200px] mx-auto mb-5 object-cover">
        <div class="grid place-items-center grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-y-12 md:gap-y-20 lg:gap-y-24 mb-[67px]">
            <a href="{{route('buyer')}}" class="overflow-hidden w-[150px] h-[150px] md:w-[200px] md:h-[200px]">
                <img src="{{asset('assets/images/shoes.png')}}" alt="shoes" class="w-[150px] h-[150px] md:w-[200px] md:h-[200px] object-cover bg-secondary transition hover:scale-110">
            </a>
            @for ($i = 1; $i < 25; $i++)
                <a href="#" class="overflow-hidden w-[150px] h-[150px] md:w-[200px] md:h-[200px]">
                    <img src="{{asset('assets/images/shoes.png')}}" alt="shoes" class="w-[150px] h-[150px] md:w-[200px] md:h-[200px] object-cover bg-secondary transition hover:scale-110">
                </a>
            @endfor
        </div>
    </div>
@endsection
