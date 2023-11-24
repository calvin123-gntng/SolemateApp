<div class="{{request()->is('login') || request()->is('register') || request()->is('checkout') ? 'hidden': 'flex'}} w-full items-center justify-start h-[133px] px-[20px] lg:px-[37px] gap-x-44 border-t border-[#A7A7A7]">
    <p class="text-base lg:text-[30px] font-light text-[#D7D7D7]">All rights reserved by <span class="font-bold">SoleMate Store</span> Copyright {{date('Y')}}</p>
</div>