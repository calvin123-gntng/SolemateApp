<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    <title>Document</title>
</head>
<body>

    @yield('content')

    @include('includes.footer')

    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
