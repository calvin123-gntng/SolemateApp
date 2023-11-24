<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

{{-- Google Font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap" rel="stylesheet">

{{-- Tailwindcss cdn --}}
<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

{{-- <title>{{$title}}</title> --}}
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#1E1E1E',
                    secondary: '#D9D9D9',
                    orange: '#FFB017',
                    blue: '#F2F7FF'
                }
            }
        }
    }
</script>
    
