@extends('layouts.empty')
@section('title', 'Quên Mật Khẩu - Forgot Password')
@section('content')
<main class="grid place-items-center w-screen">
    <form action="{{route('auth.process-forgot-password')}}" method="POST"
        class="shadow-menu border border-gray-500 rounded-md p-4 w-96 max-w-[90%]">
        @csrf
        <h1 class="text-2xl mb-1 font-medium text-center">Forgot password?</span></h1>
        <p class="text-sm text-center">Remember your password? <a class="text-blue-500 hover:underline"
                href="{{route('auth.getSignin')}}">Sign
                in</a></p>
        <div class="flex flex-col gap-1 mb-3">
            <label for="email" class="text-sm font-medium">Email</label>
            <input type="text" name="email" id="email" placeholder="Enter Email"
                class="outline-none bg-transparent border border-secondary rounded-md text-white p-2 focus:border-blue-500 duration-200"
                value="{{old('email')}}" autofocus>
            <p class="text-red-400 text-sm">@error('email'){{$message}}@enderror</p>
        </div>
        @if (session('sent_success'))
        <p class="text-sm text-blue-500 mb-3">
            {{session('sent_success')}}
        </p>
        @endif
        <button
            class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white w-full rounded-md text-base font-medium mb-4">Reset
            password</button>
    </form>
</main>
@endsection