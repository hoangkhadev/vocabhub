@extends('layouts.app')
@section('title', 'Hồ Sơ Của Tôi - My Profile' )
@section('content')
<h1 class="text-3xl font-semibold py-4">My Profile</h1>
<form action="{{route('user.update')}}" method="POST">
    @csrf
    <input type="text" name="id" value="{{$user->id}}" hidden>
    <div class="flex flex-col gap-1 mb-3">
        <label for="name" class="text-sm font-medium">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter Name"
            class="outline-none bg-transparent border border-secondary rounded-md text-white p-2 focus:border-blue-500 duration-200"
            value="{{ $user->name}}" autocomplete="false">
        <p class="text-red-400 text-sm">@error('name'){{$message}}@enderror</p>
    </div>
    <div class="flex flex-col gap-1 mb-3">
        <label for="email" class="text-sm font-medium">Email</label>
        <input type="text" name="email" id="email" placeholder="Enter Email"
            class="outline-none bg-transparent border border-secondary rounded-md text-white p-2 focus:border-blue-500 duration-200"
            value="{{$user->email}}" autocomplete="false">
        <p class="text-red-400 text-sm">@error('email'){{$message}}@enderror</p>
    </div>
    <div class="flex items-center gap-x-2">
        <button
            class="px-4 outline-none border-none h-10 bg-blue-600 hover:bg-blue-500 text-white rounded-md text-base font-medium mb-4">Update</button>
        <a href="{{route('user.delete', ['id' => $user->id])}}"
            class="px-4 inline-flex items-center h-10 bg-red-600 hover:bg-red-500 text-white rounded-md text-base font-medium mb-4">
            Delete account
        </a>
    </div>
</form>
@endsection