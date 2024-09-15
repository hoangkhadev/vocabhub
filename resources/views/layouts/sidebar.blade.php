@php
$route = request()->route()->getName();
@endphp

<aside class="w-fit p-4 border-r border-r-secondary">
    <a href="{{route('guest.home')}}" class="flex items-center gap-x-2">
        <img src="{{asset('logo.png')}}" alt="Logo" height="40" width="50">
        <h1 class="font-bold text-xl">VocabHub</h1>
    </a>

    <ul class="mt-4 mb-3 w-52">
        <li
            class="rounded-lg hover:bg-secondary mb-3 {{($route === 'guest.topic' || $route === 'guest.home') ? 'text-blue-600' : 'text-white'}}">
            <a href="{{route('guest.topic')}}" class="flex items-center gap-x-2 px-2 py-2 font-medium text-base">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                </svg>
                <span>Your Topics</span>
            </a>
        </li>
    </ul>
</aside>