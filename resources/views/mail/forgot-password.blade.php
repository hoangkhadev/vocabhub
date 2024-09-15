@extends('layouts.empty')
@section('content')
<div style="padding: 20px 40px; border: 1px solid gray; box-shadow: 0 0 5px 5px rgba(0,0,0,0.5); border-radius: 10px;">
    <h1 style="text-align: center; font-weight: 500; font-size: 18px;">Hello <span
            style="color: rgba(0, 0, 255, 0.788)">{{$name}}</span>
    </h1>
    <p style="font-size: 16px; text-align: center">Click to reset your password</p>
    <a href="{{route('auth.reset-password')}}"
        style="display: block; padding: 8px 16px; width: fit-content; margin: 0 auto; color: white; background-color: rgba(45, 45, 247, 0.986); border-radius: 8px; text-decoration: none">Reset
        Password</a>
</div>
@endsection