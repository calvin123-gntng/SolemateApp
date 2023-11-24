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
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Photo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($order->details as $i => $data)
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
                                {{ $data->product->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->product->category->name  }}
                            </td>
                            <td class="px-6 py-4">
                                <img class="w-12 h-12 rounded" src="{{asset($data->product->photo)}}" alt="shoe">
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->quantity }}
                            </td>
                            <td class="px-6 py-4">
                                Rp. {{ number_format($data->product->price )}}
                            </td>
                            <td class="px-6 py-4">
                                Rp. {{ number_format($data->subtotal) }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-orange">No Data</td>
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
