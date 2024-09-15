@extends('layouts.empty')
@section('title', 'Tạo lại mật khẩu - Reset Password')
@section('content')
<main class="grid place-items-center w-screen">
    <form action="{{route('auth.process-reset-password')}}" method="POST"
        class="shadow-menu border border-gray-500 rounded-md p-4 w-96 max-w-[90%]">
        @csrf
        <h1 class="text-2xl font-medium text-center mb-4">Reset your password</span></h1>
        <div class="flex flex-col gap-1 mb-3">
            <label for="password" class="text-sm font-medium">New Password</label>
            <input type="password" name="password" id="password" placeholder="Enter New Password"
                class="outline-none bg-transparent border border-secondary rounded-md text-white p-2 focus:border-blue-500 duration-200"
                autofocus>
            <p class="text-red-400 text-sm">@error('password'){{$message}}@enderror</p>
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