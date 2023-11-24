@extends('pages.admin.index');
@section('admin_content')
   <div>
       @include('includes.pointer')
       <div class="mb-4">
            <h1 class="text-2xl font-bold">Category</h1>
            <small class="text-gray-400">Add Category here</small>
       </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form class="lg:w-1/2" action="{{ route('admin.category.store') }}" method="PATCH" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Category name</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 focus:outline-0 block w-full p-2.5"  required value="{{ old('name') }}">
                @error('name')
                    <div class="alert" style="color:red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                <textarea id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 focus:outline-0 block w-full p-2.5" >{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert" style="color:red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Logo</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none " aria-describedby="logo_category" name="image" id="logo_category" type="file">
                <div class="mt-1 text-sm text-gray-500" id="logo_category">
                    A logo product very useful to describe your category
                </div>
                @error('image')
                    <div class="alert" style="color:red;">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                + Add
            </button>
        </form>
    </div>
   </div>
@endSection()
