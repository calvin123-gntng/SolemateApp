@extends('includes.main')
@section('content')
    @include('layouts.navbar')
    <div class="px-8 py-10 mt-3 mb-24">
        <h1 class="mb-10 text-4xl font-bold text-center uppercase">Our <span class="text-orange">Designer</span></h1>
       <div class="grid w-full h-full gap-5 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <div class="p-3 border rounded">
            <img src="{{asset('assets/images/nike.png')}}" alt="nike" class="object-cover w-16 h-16 mb-3 ml-auto">
            <h1 class="mb-3 text-2xl font-bold uppercase">Nike</h1>
            <h2 class="mb-3 text-lg font-medium">Details:</h2>
            <ul class="px-5 text-justify list-disc">
                <li>Nama Perusahaan:  Nike, Inc.</li>
                <li>Tanggal Pendirian:  Didirikan pada tahun 1964 oleh Phil Knight dan Bill Bowerman.</li>
                <li>Negara Asal: Amerika Serikat</li>
                <li>
                    Nike adalah salah satu merek olahraga terbesar di dunia. Merek ini terkenal dengan logo Swoosh dan produk-produknya yang mencakup sepatu, pakaian, dan aksesoris olahraga.
                </li>
            </ul>
        </div>
        <div class="p-3 border rounded">
            <img src="{{asset('assets/images/adidas.png')}}" alt="adidas" class="object-cover w-16 h-16 mb-3 ml-auto">
            <h1 class="mb-3 text-2xl font-bold uppercase">Adidas</h1>
            <h2 class="mb-3 text-lg font-medium">Details:</h2>
            <ul class="px-5 text-justify list-disc">
                <li>Nama Perusahaan: Adidas AG</li>
                <li>Tanggal Pendirian:  Didirikan pada tahun 1949 oleh Adolf "Adi" Dassler</li>
                <li>Negara Asal: Jerman</li>
                <li>
                    Deskripsi Singkat: Adidas adalah perusahaan sepatu, pakaian, dan aksesoris olahraga terkemuka di dunia. Merek ini terkenal dengan tiga garis strip khasnya.
                </li>
            </ul>
        </div>
        <div class="p-3 border rounded">
            <img src="{{asset('assets/images/dior.png')}}" alt="dior" class="object-cover w-16 h-16 mb-3 ml-auto">
            <h1 class="mb-3 text-2xl font-bold uppercase">dior</h1>
            <h2 class="mb-3 text-lg font-medium">Details:</h2>
            <ul class="px-5 text-justify list-disc">
                <li>Nama Perusahaan: Christian Dior SE</li>
                <li>Tanggal Pendirian:   Didirikan oleh Christian Dior pada tahun 1946.</li>
                <li>Negara Asal: Prancis</li>
                <li>
                    Deskripsi Singkat: Dior adalah rumah mode mewah Prancis yang terkenal dengan desain haute couture dan parfum. Merek ini mencakup berbagai produk fashion, termasuk pakaian, tas, sepatu, dan perhiasan.
                </li>
            </ul>
        </div>
        <div class="p-3 border rounded">
            <img src="{{asset('assets/images/balenciaga.png')}}" alt="balenciaga" class="object-cover w-16 h-16 mb-3 ml-auto">
            <h1 class="mb-3 text-2xl font-bold uppercase">Balenciaga</h1>
            <h2 class="mb-3 text-lg font-medium">Details:</h2>
            <ul class="px-5 text-justify list-disc">
                <li>Nama Perusahaan: Balenciaga</li>
                <li>Tanggal Pendirian:  Didirikan oleh Cristóbal Balenciaga pada tahun 1919.</li>
                <li>Negara Asal: Spanyol</li>
                <li>
                    Deskripsi Singkat: Balenciaga adalah rumah mode mewah yang terkenal dengan desain fashion inovatif dan produk-produk high-end, termasuk pakaian, sepatu, dan aksesoris.
                </li>
            </ul>
        </div>
       </div>
    </div>
@endSection()