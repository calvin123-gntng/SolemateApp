@extends('includes.main')
@section('content')
    @include('layouts.navbar')
    <div class="px-8 py-10 mb-10">
        <ul class="flex flex-wrap md:flex-nowrap items-center justify-start w-full p-3 bg-white shadow-[0_0_15px_rgba(0,0,0,0.1)] gap-2 mb-10">
            {{-- <li class="px-3 py-1 text-white border rounded bg-orange">
                <a href="#">👞 Shoes</a>
            </li> --}}
            {{-- @foreach($categories as $logo => $category)
                <li class="px-3 py-1 border rounded hover:bg-orange hover:text-white">
                    <a href="{{ route('product.category', $category->id) }}">
                        <p>
                            {{$category->name}}
                        </p>
                    </a>
                </li>
            @endforeach --}}
        </ul>
        <div class="grid grid-cols-2 gap-8 md:grid-cols-3 lg:grid-cols-2 xl:grid-cols-3">
            @foreach($collection as $i => $data)
                <div class="flex flex-wrap items-center border rounded lg:flex-nowrap lg:gap-x-3">
                    <div class="overflow-hidden rounded-t md:w-full lg:w-auto lg:rounded-tr-none lg:rounded-l">
                        <img src="{{asset($data->photo)}}" alt="shoes" class="object-cover w-full transition hover:scale-105 bg-secondary " style="max-width:200px;max-height:200px;">
                    </div>
                    <div class="h-full px-2 py-4 lg:py-2">
                        <h2 class="mb-1 text-lg font-medium md:mb-3 md:text-xl xl:text-2xl">{{ $data->name }}</h2>
                        <ul class="items-center justify-start hidden gap-2 mb-4 md:flex md:mb-10">
                            {{-- @foreach(array("🏀" => "sport", '👟' => 'casual') as $logo => $category)
                                <li class="px-3 py-1 text-sm capitalize border rounded hover:bg-slate-100"><a href="#">{{$logo}} {{$category}}</a></li>
                            @endforeach --}}
                            {{-- @foreach($categories as $count => $category) --}}
                            @if($i % 2 == 0)
                                <li class="px-3 py-1 text-sm capitalize border rounded hover:bg-slate-100"><a href="#">🏀 {{$data->category->name}}</a></li>
                            @else
                                <li class="px-3 py-1 text-sm capitalize border rounded hover:bg-slate-100"><a href="#">👟 {{$data->category->name}}</a></li>
                            @endif
                            {{-- @endforeach --}}
                        </ul>
                        <p class="mb-3">Rp. {{number_format($data->price)}}</p>
                        <a href="{{route('buyer', $data->id)}}" class="px-3 py-2 font-medium text-white rounded md:px-5 md:py-2 bg-orange">More Info</a>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        {{ $collection->links() }}
    </div>
@endSection()
