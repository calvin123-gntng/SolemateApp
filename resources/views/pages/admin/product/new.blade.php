@extends('pages.admin.index');
@section('admin_content')
   <div>
       @include('includes.pointer')
       <div class="mb-4">
            <h1 class="text-2xl font-bold">Product</h1>
            <small class="text-gray-400">Add product here</small>
       </div>
        <form class="lg:w-1/2" method="POST" enctype="multipart/form-data" action="{{route('admin.product.store')}}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Product name</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 focus:outline-0 block w-full p-2.5"  required value="{{ old('name') }}">
            </div>
            <div class="mb-4">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select category</label>
                <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5">
                    @foreach ($category as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="mb-4">
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock</label>
                <input type="number" name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 focus:outline-0 block w-full p-2.5"  required value="{{ old('stock') }}">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Photo</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none " aria-describedby="photo_product" name="photo" id="photo_product" type="file">
                <div class="mt-1 text-sm text-gray-500" id="photo_product">
                    A photo product very useful to describe your product
                </div>
            </div>
            <div class="mb-4">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"></textarea>
            </div>
            {{-- <div class="mb-4">
                <label for="size" class="block mb-2 text-sm font-medium text-gray-900">Size</label>
                <input type="number" id="size" name="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 focus:outline-0 block w-full p-2.5"  required value="{{ old('size') }}">
            </div>
            <div class="mb-4">
                <label for="color" class="block mb-2 text-sm font-medium text-gray-900">Color</label>
                <input type="color" name="color" id="color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 focus:outline-0 block w-full p-2.5"  required value="{{ old('color') }}">
            </div> --}}
            <div class="mb-4">
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Brand</label>
                <input type="text" id="brand" name="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 focus:outline-0 block w-full p-2.5"  required value="{{ old('brand') }}">
            </div>
            <div class="mb-4">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                <input type="tel" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 focus:outline-0 block w-full p-2.5"  required value="{{ old('price') }}">
            </div>
            <button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                + Add
            </button>

        </form>

    </div>
   </div>
   @section('custom_js')
    <script>
        ribuan('price');
    </script>
    @endsection()
@endSection()
