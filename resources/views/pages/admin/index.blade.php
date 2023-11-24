<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.head');
        {{-- Flowbite --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />

        {{-- Data Table --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

        <title>{{$title}}</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </head>
    <body>
        @include('includes.sidebar')
        <div class="p-4 mt-10 sm:ml-64">
            @yield('admin_content')
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <script>
            function ribuan(obj) {
                $('#' + obj).keyup(function (event) {
                    if (event.which >= 37 && event.which <= 40) return;
                    // format number
                    $(this).val(function (index, value) {
                        return value
                            .replace(/\D/g, "")
                            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    });
                    var id = $(this).data("id-selector");
                    var classs = $(this).data("class-selector");
                    var value = $(this).val();
                    var noCommas = value.replace(/,/g, "");
                    $('#' + id).val(noCommas);
                    $('.' + classs).val(noCommas);
                });
            }
        </script>
        @yield('custom_js')
    </body>
</html>
