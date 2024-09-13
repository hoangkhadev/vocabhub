@extends('layouts.empty')
@section('title', 'Đăng Nhập | Sign In')
@section('content')
<main class="grid place-items-center w-screen">
    <form action="{{route('auth.signin')}}" method="POST"
        class="shadow-menu border border-gray-500 rounded-md p-4 w-96 max-w-[90%]">
        @csrf
        <h1 class="text-3xl font-medium mb-4">Sign <span class="text-blue-500">In</span></h1>
        <div class="flex flex-col gap-1 mb-3">
            <label for="email" class="text-sm font-medium">Email</label>
            <input type="text" name="email" id="email" placeholder="Enter Email"
                class="outline-none bg-transparent border border-secondary rounded-md text-white p-2 focus:border-blue-500 duration-200"
                value="{{old('email')}}">
            <p class="text-red-400 text-sm">@error('email'){{$message}}@enderror</p>
        </div>
        <div class="flex flex-col gap-1 mb-3">
            <label for="password" class="text-sm font-medium">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password"
                class="outline-none bg-transparent border border-secondary rounded-md text-white p-2 focus:border-blue-500 duration-200"
                value="{{old('password')}}">
            <p class="text-red-400 text-sm">@error('password'){{$message}}@enderror</p>
        </div>
        <a href="" class="text-sm float-end hover:underline mb-4">Forgot password?</a>
        <p class="text-sm text-red-400">
            {{session()->get('errorSignin')}}
        </p>
        <button
            class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white w-full rounded-md text-base font-medium mb-4">Sign
            In</button>
        <p class="text-sm text-center">Don't have an account? <a href="{{route('auth.getSignup')}}"
                class="text-xs font-medium text-blue-500 hover:underline">Sign Up
                now</a></p>
    </form>
</main>
@endsection