@extends('layouts.empty')
@section('title', 'Đăng Ký | Sign Up')
@section('content')
<main class="grid place-items-center w-screen">
    <form action="{{route('auth.signup')}}" method="POST"
        class="shadow-menu border border-gray-500 rounded-md p-4 w-96 max-w-[90%]">
        @csrf
        <h1 class="text-3xl font-medium mb-4">Sign <span class="text-blue-500">Up</span></h1>
        <div class="flex flex-col gap-1 mb-3">
            <label for="name" class="text-sm font-medium">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter Name"
                class="outline-none bg-transparent border border-secondary rounded-md text-white p-2 focus:border-blue-500 duration-200"
                value="{{old('name')}}">
            <p class="text-red-400 text-sm">@error('name'){{$message}}@enderror</p>
        </div>
        <div class="flex flex-col gap-1 mb-3">
            <label for="email" class="text-sm font-medium">Email</label>
            <input type="text" name="email" id="email" placeholder="Enter Email"
                class="outline-none bg-transparent border border-secondary rounded-md text-white p-2 focus:border-blue-500 duration-200"
                value="{{old('email')}}">
            <p class="text-red-400 text-sm">@error('email'){{$message}}@enderror</p>
        </div>
        <div class="flex flex-col gap-1 mb-3">
            <label for="password" class="text-sm font-medium">Password</label>
            <div class="relative">
                <input type="password" name="password" id="password" placeholder="Enter Password"
                    class="outline-none bg-transparent border border-secondary rounded-md text-white p-2 focus:border-blue-500 duration-200 w-full"
                    value="{{old('password')}}">
                <div id="toggle-password"
                    class="absolute top-1/2 -translate-y-1/2 right-5 hover:cursor-pointer hover:scale-110 hover:text-blue-500 duration-300">
                    <svg id="hide-password" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <svg id="show-password" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>

                </div>
            </div>
            <p class="text-red-400 text-sm">@error('password'){{$message}}@enderror</p>
        </div>
        <div class="flex flex-col gap-1 mb-3">
            <label for="password-confirm" class="text-sm font-medium">Password Confirm</label>
            <div class="relative">
                <input type="password" name="password_confirmation" id="password-confirm"
                    placeholder="Enter Password Confirm"
                    class="outline-none bg-transparent border border-secondary rounded-md text-white p-2 focus:border-blue-500 duration-200 w-full"
                    value="{{old('password_confirmation')}}">
                <div id="toggle-password-confirm"
                    class="absolute top-1/2 -translate-y-1/2 right-5 hover:cursor-pointer hover:scale-110 hover:text-blue-500 duration-300">
                    <svg id="hide-password-confirm" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <svg id="show-password-confirm" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>

                </div>
            </div>

            <p class="text-red-400 text-sm">@error('password_confirmation'){{$message}}@enderror</p>
        </div>
        <p class="text-sm text-red-400">
            {{session()->get('errorSignin')}}
        </p>
        <button
            class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white w-full rounded-md text-base font-medium mb-4">Sign
            Up</button>
        <p class="text-sm text-center">Already have an account? <a href="{{route('auth.getSignin')}}"
                class="text-xs font-medium text-blue-500 hover:underline">Sign In
                now</a></p>
    </form>
</main>
@endsection
@push('js')
<script src="{{asset('js/utils.js')}}"></script>
<script>
    $(document).ready(function () {
        handleShowHidePassword('#toggle-password', '#password', '#hide-password', '#show-password');
        handleShowHidePassword('#toggle-password-confirm', '#password-confirm', '#hide-password-confirm', '#show-password-confirm');
    });
</script>
@endpush