<nav id="navbar" class="w-full relative z-50 lg:static flex items-center justify-between xl:justify-start bg-primary h-[67px] lg:h-[77px] px-[20px] lg:px-[32px] xl:gap-x-44 border-b border-[#A7A7A7] overflow-hidden lg:overflow-auto">
    <a href="{{route('home')}}" class="uppercase font-bold text-2xl lg:text-[50px] text-white tracking-[.25em]">solemate</a>
    <ul class="menu flex flex-col items-center justify-center lg:items-start lg:justify-start lg:static lg:flex-row bg-primary lg:bg-none list-none min-h-screen lg:min-h-0 text-white font-medium text-[20px] gap-y-10 lg:gap-y-0 gap-x-5">
        <li class="text-center w-28"><a href="{{route('home')}}" class="{{request()->is('home') ? 'font-bold' : ''}} hover:font-bold">HOME</a></li>
        <li class="text-center w-28"><a href="{{route('category')}}" class="{{request()->is('category') ? 'font-bold' : ''}} hover:font-bold">CATEGORY</a></li>
        <li class="text-center w-28"><a href="{{route('designer')}}" class="{{request()->is('designer') ? 'font-bold' : ''}} hover:font-bold">DESIGNER</a></li>
        <li class="text-center w-28"><a href="{{route('about')}}" class="{{request()->is('about') ? 'font-bold' : ''}} hover:font-bold">ABOUT</a></li>
        <a href="{{route('cart')}}" class="block fill-white lg:hidden" title="cart">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path d="M21.822 7.431A1 1 0 0 0 21 7H7.333L6.179 4.23A1.994 1.994 0 0 0 4.333 3H2v2h2.333l4.744 11.385A1 1 0 0 0 10 17h8c.417 0 .79-.259.937-.648l3-8a1 1 0 0 0-.115-.921zM17.307 15h-6.64l-2.5-6h11.39l-2.25 6z"></path><circle cx="10.5" cy="19.5" r="1.5"></circle><circle cx="17.5" cy="19.5" r="1.5"></circle></svg>
        </a>
        @guest
            <li class="text-center w-28"><a href="{{route('login')}}" class="{{request()->is('login') ? 'font-bold' : ''}} hover:font-bold">Login</a></li>
        @endguest
        @auth
        <li class="text-center">
            <a href="{{route('logout')}}" class="{{request()->is('logout') ? 'font-bold' : ''}} hover:font-bold">Logout</a>
        </li>
        @endauth
    </ul>
    <a href="{{route('cart')}}" class="hidden fill-white lg:block" title="cart">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path d="M21.822 7.431A1 1 0 0 0 21 7H7.333L6.179 4.23A1.994 1.994 0 0 0 4.333 3H2v2h2.333l4.744 11.385A1 1 0 0 0 10 17h8c.417 0 .79-.259.937-.648l3-8a1 1 0 0 0-.115-.921zM17.307 15h-6.64l-2.5-6h11.39l-2.25 6z"></path><circle cx="10.5" cy="19.5" r="1.5"></circle><circle cx="17.5" cy="19.5" r="1.5"></circle></svg>
    </a>
    <button id="btn-menu" class="grid place-items-center w-[35px] h-[35px] lg:hidden fill-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg>
    </button>
</nav>
