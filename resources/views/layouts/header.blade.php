<header class="">
    <nav class="py-4 w-full flex items-center justify-between">
        <div class="relative flex-1 w-1/2">
            <div class="absolute top-1/2 -translate-y-1/2 left-2 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>
            <form action="">
                <input type="text" name="q" placeholder="Search for..."
                    class="outline-none bg-secondary pl-10 py-2 rounded-md focus:border-2 focus:border-gray-400 placeholder:font-medium w-1/2">
            </form>
        </div>
        <div class="flex items-center gap-x-12">
            <a href="{{route('guest.topic.create')}}"
                class="bg-blue-600 hover:bg-blue-700 py-2 px-2 rounded-md flex items-center gap-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="font-medium">Create new topic</span>
            </a>
            <div class="relative group">
                <div class="hover:cursor-pointer">
                    <img src="{{asset('user.jpg')}}" alt="User Avatar" width="45" height="45" class="rounded-full">
                </div>
                <ul
                    class="group-hover:block hidden absolute bg-primary right-0 top-[120%] z-[1] shadow-menu rounded-md min-w-72 max-w-72 after:w-full after:h-5 after:left-4 after:bg-transparent after:absolute after:-top-5 after:z-[2]">
                    <li class="flex items-center gap-x-2 border-b py-2 px-4">
                        <img src="{{asset('user.jpg')}}" alt="User Avatar" width="40" height="40" class="rounded-full">
                        <div class="flex flex-col gap-y-1">
                            <span class="relative top-1 text-sm font-medium text-orange-400">{{ auth()->user()->name
                                }}</span>
                            <span class="text-xs">{{ auth()->user()->email }}</span>
                        </div>
                    </li>
                    <li class="px-4 py-2 hover:bg-secondary">
                        <a href="{{route('auth.profile')}}" class="w-full flex gap-x-2 text-sm font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="px-4 py-2 hover:bg-secondary ">
                        <a href="{{route('auth.signout')}}"
                            class="text-red-400 text-sm font-medium w-full cursor-pointer flex items-center gap-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                            </svg>
                            <span>Sign out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>