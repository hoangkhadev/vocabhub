@extends('layouts.app')
@section('title', 'Danh sách chủ đề - List topic')
@section('content')
<h1 class="text-3xl font-semibold py-4">Your Topics</h1>
<ul class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 gap-5">
    @foreach ($topics as $topic)
    <li
        class="group relative bg-secondary p-4 rounded-lg hover:scale-105 hover:bg-slate-700 transition-all duration-200 overflow-hidden topic-item">
        <a href="{{route('guest.pratice', ['id' =>  $topic->slug])}}" class="flex flex-col gap-4">
            <div class="flex justify-between gap-4">
                <div>
                    <h3 class="font-medium text-amber-500 text-lg mb-2">{{$topic->name}}</h3>
                    <p class="text-[11px] font-medium bg-gray-500 px-2 rounded-lg w-fit">{{$topic->count}} words
                    </p>
                </div>
                <img src="{{asset('topic.jpg')}}" height="60" width="60" alt="Logo topic" class="rounded-lg">
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div
                        class="text-blue-400 text-sm font-medium hover:underline hover:bg-gray-600 w-fit px-2 py-1 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </div>
                    <form method="POST" action="{{route('guest.topic.destroy')}}" title="delete" class="relative z-10">
                        @csrf
                        @method('DELETE')
                        <input type="text" name="id" value="{{$topic->id}}" hidden>
                        <button
                            class="text-red-400 text-sm font-medium hover:underline hover:bg-gray-600 w-fit px-2 py-1 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>
                <p class="text-sm font-medium">
                    Best score: <span class="text-xs text-blue-500">
                        <span>{{$topic->max_score?? 0}}</span>/<span>{{$topic->count ?? 0}}</span>
                    </span>
                </p>
            </div>
        </a>
        <span
            class="absolute left-0 bottom-0 bg-blue-400 w-0 group-hover:w-full transition-all duration-400 h-1"></span>
    </li>
    @endforeach
</ul>
<div id="empty-topic" class="w-fit mx-auto my-10">
    <svg class="mx-auto" id="Layer_1" enable-background="new 0 0 497 497" height="100" viewBox="0 0 497 497" width="100"
        xmlns="http://www.w3.org/2000/svg">
        <g>
            <g>
                <path
                    d="m487 163.491h-477c-5.523 0-10 4.477-10 10v313.509c0 5.523 4.477 10 10 10h219.378c4.383-5.771 11.316-9.5 19.122-9.5s14.739 3.729 19.122 9.5h219.378c5.523 0 10-4.477 10-10v-313.509c0-5.522-4.477-10-10-10z"
                    fill="#6e9eff" />
            </g>
            <g>
                <path
                    d="m487 163.491h-40c5.523 0 10 4.477 10 10v313.509c0 5.523-4.477 10-10 10h40c5.523 0 10-4.477 10-10v-313.509c0-5.522-4.477-10-10-10z"
                    fill="#5990ff" />
            </g>
            <g>
                <path d="m32.648 210.5h431.704v255.418h-431.704z" fill="#c5d7e6" />
                <path d="m248.5 154.199v308.469s-81.351-67.317-215.852-20v-288.469s108.468-50.99 215.852 0z"
                    fill="#e4ecf2" />
                <path d="m248.5 159.116s-46.85-105.069-165.852-130v303.552c119.002 24.931 165.852 130 165.852 130z"
                    fill="#f0f5fa" />
                <path
                    d="m248.508 159.116s3.142-134.184-115.86-159.116v303.552c119.002 24.931 115.86 159.116 115.86 159.116z"
                    fill="#e4ecf2" />
                <path d="m248.5 154.199v308.469s81.351-67.317 215.852-20v-288.469s-108.468-50.99-215.852 0z"
                    fill="#e4ecf2" />
                <path d="m248.516 159.116s65.325-70 185.852-70v303.552c-120.528 0-185.852 70-185.852 70z"
                    fill="#f0f5fa" />
            </g>
        </g>
    </svg>
    <p class="text-lg font-medium w-full text-center">Don't have any topic now</p>
</div>

@endsection

@push('js')
<script>
    $(document).ready(function () {
        if($('.topic-item').length <= 0) {
            $('#empty-topic').show();
        } else {
            $('#empty-topic').hide();
        }
             
    });
</script>
@endpush