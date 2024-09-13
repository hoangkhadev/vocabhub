@extends('layouts.app')
@section('title', 'Luyện tập - Pratice')
@section('content')
<h1 class="text-3xl font-semibold py-4">Topic Months</h1>
<ul class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 gap-5">
    <li
        class="group relative bg-secondary p-4 rounded-lg hover:scale-105 hover:bg-slate-700 transition-all duration-200 overflow-hidden">
        <a href="" class="flex justify-between gap-4">
            <div>
                <h3 class="font-medium text-amber-500 text-lg mb-2">Months</h3>
                <p class="text-xs font-medium bg-gray-500 px-2 rounded-lg w-fit">12 words</p>
            </div>
            <img src="{{asset('topic.jpg')}}" height="60" width="60" alt="Logo topic" class="rounded-lg">
        </a>
        <span
            class="absolute left-0 bottom-0 bg-blue-400 w-0 group-hover:w-full transition-all duration-400 h-1"></span>
    </li>
</ul>
@endsection