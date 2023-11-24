@extends('pages.admin.index')
@section('admin_content')
    <div>
        @include('includes.pointer')
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-bold">Category</h1>
                    <small class="text-gray-400">List of category in store</small>
                </div>
                <a href="{{route('admin.category.new')}}" class="px-5 py-2 text-sm font-medium text-white bg-yellow-400 rounded focus:outline-none hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 me-2">
                    + New
                </a>
            </div>
            @if(session('success'))
                <div class="alert" style="color:green;">
                    {{ session('success') }}
                </div>
            @endif
            <div class="relative p-2 overflow-x-auto shadow-md sm:rounded-lg">
                <table id="myTable" class="w-full text-sm text-left text-gray-500 rtl:text-right">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Logo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $i => $item)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $i+1 }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->description }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{asset($item->photo)}}" target="_blank">
                                        <img class=" rounded" style="width:150px;height:150px;" src="{{asset($item->photo)}}" alt="shoe">
                                    </a>
                                </td>
                                <td class="flex items-center gap-3 px-6 py-4">
                                    <a href="{{route('admin.category.edit', $item->id) }}" class="flex gap-2 p-2 font-medium text-white bg-green-500 rounded fill-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
                                        Edit
                                    </a>
                                <a onclick="return confirm('Yakin ingin menghapus data ini?');" href="{{route('admin.category.delete', $item->id)}}" class="flex gap-2 p-2 font-medium text-white bg-red-500 rounded fill-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endSection()
