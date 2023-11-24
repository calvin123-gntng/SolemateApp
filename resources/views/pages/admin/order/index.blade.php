@extends('pages.admin.index')
@section('admin_content')
    <div>
        @include('includes.pointer')
            <div class="mb-4">
                <h1 class="text-2xl font-bold">Order</h1>
                <small class="text-gray-400">List of order in store</small>
            </div>
            <div class="relative p-2 overflow-x-auto shadow-md sm:rounded-lg">
                <table id="myTable" class="w-full text-sm text-left text-gray-500 rtl:text-right">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Order trx
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Customer name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Order Time
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($collection as $i => $order)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $i+1 }}
                            </th>
                            <td class="p-2 px-6 py-4">
                                <span class="p-2 text-white rounded bg-orange whitespace-nowrap">
                                    {{ 'TRX - '.$order->id }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                {{ ucwords($order->user->first_name . ' ' . $order->user->last_name) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $order->created_at }}
                            </td>
                            <td class="px-6 py-4">
                                Rp. {{ number_format($order->grandtotal) }}
                            </td>
                            <td class="flex items-center gap-3 px-6 py-4">
                                <a href="{{ route('order.show', $order->id) }}" class="flex gap-2 p-2 font-medium text-white bg-orange rounded fill-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/></svg>
                                    Show
                                </a>
                                {{-- @if($order->status == 'waiting')
                                <a href="/admin/order/1" class="flex gap-2 p-2 font-medium text-white bg-green-500 rounded fill-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>                                    Accept
                                </a>
                                @endif --}}
                                {{-- <a href="{{route('order.destroy', $order->id)}}" onclick="return confirm('Yakin ingin menghapus data ini?');" class="flex gap-2 p-2 font-medium text-white bg-red-500 rounded fill-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                    Delete
                                </a> --}}
                            </td>
                        </tr>
                        @empty
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="text-orange"> No Data </td>
                        </tr>
                        @endforelse
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
