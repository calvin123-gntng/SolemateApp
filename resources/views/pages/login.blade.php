@extends('includes.main')
@section('content')
<div class="w-full h-screen overflow-hidden bg-primary">
    @include('layouts.navbar')
    <div class="flex items-center justify-center w-full h-full p-5 md:p-8 lg:p-0">
        <div class="relative w-full h-[450px] lg:w-[960px] lg:h-[500px] bg-orange rounded-[24px] p-10">
            <div class="absolute w-[95%] h-[450px] -top-14 lg:-top-24 left-1/2 -translate-x-1/2 lg:w-[866px] lg:h-[505px] bg-blue rounded-[34px] px-5 py-8 md:p-10">
                <h2 class="font-medium text-3xl lg:text-[36px] text-center mb-3 lg:mb-[18px]">Log in</h2>
                <p class="text-center font-medium text-base lg:text-[20px] mb-8 lg:mb-[40px]">New to SOLEMATE? <a href="{{route('register')}}" class="text-orange">Sign up now!</a></p>
                <form action="{{ route('login') }}" method="POST" class="w-full lg:w-[665px] mx-auto">
                    @csrf
                    <input type="email" name="email" placeholder="Email Address" class="w-full h-[48px] lg:h-[51px] rounded-[8px] border border-black px-4 mb-8 lg:mb-[38px] lg:text-[20px] placeholder:lg:text-[20px]">
                    @error('email')
                    <small>
                        <i class="text-orange">{{ $message  }}</i>
                    </small>
                    @enderror
                    <div class="relative w-full h-[48px] lg:h-[51px] mb-[19px]">
                        <input type="password" name="password" id="login-password" placeholder="Password" class="w-full h-full border border-black px-4 rounded-[8px] lg:text-[20px] placeholder:lg:text-[20px]">
                        @error('password')
                            <small class="text-orange">{{ $message }}</small>
                        @enderror
                        <button type="button" id="btn-show" class="absolute bg-white top-2 right-2">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" id="svg-show" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z"></path><path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z"></path></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" id="svg-hide" class="hidden" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 19c.946 0 1.81-.103 2.598-.281l-1.757-1.757c-.273.021-.55.038-.841.038-5.351 0-7.424-3.846-7.926-5a8.642 8.642 0 0 1 1.508-2.297L4.184 8.305c-1.538 1.667-2.121 3.346-2.132 3.379a.994.994 0 0 0 0 .633C2.073 12.383 4.367 19 12 19zm0-14c-1.837 0-3.346.396-4.604.981L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.319-3.319c2.614-1.951 3.547-4.615 3.561-4.657a.994.994 0 0 0 0-.633C21.927 11.617 19.633 5 12 5zm4.972 10.558-2.28-2.28c.19-.39.308-.819.308-1.278 0-1.641-1.359-3-3-3-.459 0-.888.118-1.277.309L8.915 7.501A9.26 9.26 0 0 1 12 7c5.351 0 7.424 3.846 7.926 5-.302.692-1.166 2.342-2.954 3.558z"></path></svg> --}}
                        </button>
                    </div>
                    @if($errors->has('message'))
                        <small class="text-orange">{{ $errors->first('message') }}</small>
                    @endif
                    {{-- <a href="#" class="block font-medium lg:text-[20px] text-orange mb-[26px]">Forgot Password?</a> --}}
                    <button type="submit" class="w-full h-[48px] lg:h-[51px] rounded-[88px] text-center bg-white border border-black shadow-lg font-medium text-[16px] hover:brightness-95">
                        LOG IN
                    </button>
                </form>
            </div>
            <h1 class="absolute bottom-2 lg:bottom-5 left-1/2 -translate-x-1/2 font-extrabold text-3xl lg:text-[50px] tracking-wider">SOLEMATE</h1>
        </div>
    </div>
</div>
@endSection
