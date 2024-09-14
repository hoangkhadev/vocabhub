@extends('layouts.app')
@section('title', 'Tạo chủ đề mới - Create New Topic')
@section('content')
<h1 class="text-3xl font-semibold py-4">Create Topic</h1>
<h3 class="text-red-400 text-xl my-1">
    {{session()->get('status_create_topic')}}
</h3>
<form action="{{route('guest.topic.store')}}" method="POST" enctype='multipart/form-data'>
    @csrf
    <input type="text" name="user_id" value="{{auth()->user()->id}}" hidden>
    <div class="flex flex-col gap-2 w-1/2 mb-10">
        <label for="name" class="font-medium">NAME</label>
        <input type="text" name="name" id="name" placeholder="Enter Topic Name"
            class="bg-transparent border-b-2 outline-none text-white focus:border-amber-400" value="{{old('name')}}"
            autofocus>
        <p class="text-red-400 text-sm">@error('name'){{$message}}@enderror</p>
    </div>
    <ul id="list-item" class="mb-3 flex flex-col gap-4">
        <div class="bg-secondary rounded-xl item">
            <div class="flex justify-between items-center border-b-2 border-b-gray-800 py-4 px-4">
                <span class="text-base font-medium index">1</span>
                <div
                    class="py-1 px-2 -mx-2 hover:bg-slate-700 hover:text-red-400 rounded-lg cursor-pointer remove-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </div>
            </div>
            <div class="px-4 flex items-center gap-x-5">
                <div class="w-1/2 py-6">
                    <input type="text" placeholder="Enter English" name="english[]"
                        class="bg-transparent border-b-2 focus:border-b-amber-400 transition-all duration-300 outline-none text-white w-full mb-1 h-10">
                    <p class="text-xs font-medium text-cyan-400">ENGLISH</p>
                </div>
                <div class="w-1/2 py-6">
                    <input type="text" placeholder="Enter Vietnamese" name="vietnamese[]"
                        class="bg-transparent border-b-2 focus:border-b-amber-400 transition-all duration-300 outline-none text-white w-full mb-1 h-10">
                    <p class="text-xs font-medium text-cyan-400">VIETNAMESE</p>
                </div>
                <label for="image" class="border-dashed border-2 px-4 py-2 rounded-md group cursor-pointer">
                    <div class="flex flex-col items-center group-hover:text-amber-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-[10px] font-medium">IMAGE</span>
                    </div>
                    <input type="file" name="image[]" id="image" hidden>
                </label>
            </div>
        </div>

        <div class="bg-secondary rounded-xl item">
            <div class="flex justify-between items-center border-b-2 border-b-gray-800 py-4 px-4">
                <span class="text-base font-medium index">2</span>
                <div
                    class="py-1 px-2 -mx-2 hover:bg-slate-700 hover:text-red-400 rounded-lg cursor-pointer remove-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </div>
            </div>
            <div class="px-4 flex items-center gap-x-5">
                <div class="w-1/2 py-6">
                    <input type="text" placeholder="Enter English" name="english[]"
                        class="bg-transparent border-b-2 focus:border-b-amber-400 transition-all duration-300 outline-none text-white w-full mb-1 h-10">
                    <p class="text-xs font-medium text-cyan-400">ENGLISH</p>
                </div>
                <div class="w-1/2 py-6">
                    <input type="text" placeholder="Enter Vietnamese" name="vietnamese[]"
                        class="bg-transparent border-b-2 focus:border-b-amber-400 transition-all duration-300 outline-none text-white w-full mb-1 h-10">
                    <p class="text-xs font-medium text-cyan-400">VIETNAMESE</p>
                </div>
                <label for="image" class="border-dashed border-2 px-4 py-2 rounded-md group cursor-pointer">
                    <div class="flex flex-col items-center group-hover:text-amber-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-[10px] font-medium">IMAGE</span>
                    </div>
                    <input type="file" name="image[]" id="image" hidden>
                </label>
            </div>
        </div>
    </ul>
    <div class="mt-10 flex justify-center">
        <button id="add-item" type="button"
            class="text-base font-medium flex items-center gap-x-1 border-b-4 border-b-cyan-400 hover:border-b-amber-400 duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span>ADD ITEM</span>
        </button>
    </div>

    <button class="py-4 px-6 bg-blue-600 font-medium rounded-md hover:bg-blue-500 float-right">CREATE</button>
</form>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        $("#add-item").on('click', function() {
            const html = `
                <div class="bg-secondary rounded-xl item">
                    <div class="flex justify-between items-center border-b-2 border-b-gray-800 py-4 px-4">
                        <span class="text-base font-medium index"></span>
                        <div class="py-1 px-2 -mx-2 hover:bg-slate-700 hover:text-red-400 rounded-lg cursor-pointer remove-item">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </div>
                    </div>
                    <div class="px-4 flex items-center gap-x-5">
                        <div class="w-1/2 py-6">
                            <input type="text" placeholder="Enter English" name="english[]"
                                class="bg-transparent border-b-2 focus:border-b-amber-400 transition-all duration-300 outline-none text-white w-full mb-1 h-10">
                            <p class="text-xs font-medium text-cyan-400">ENGLISH</p>
                        </div>
                        <div class="w-1/2 py-6">
                            <input type="text" placeholder="Enter Vietnamese" name="vietnamese[]"
                                class="bg-transparent border-b-2 focus:border-b-amber-400 transition-all duration-300 outline-none text-white w-full mb-1 h-10">
                            <p class="text-xs font-medium text-cyan-400">VIETNAMESE</p>
                        </div>
                        <label for="image" class="border-dashed border-2 px-4 py-2 rounded-md group cursor-pointer">
                            <div class="flex flex-col items-center group-hover:text-amber-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                                <span class="text-[10px] font-medium">IMAGE</span>
                            </div>
                            <input type="file" name="image[]" id="image" hidden>
                        </label>
                    </div>
                </div>
            `;
            $("#list-item").append(html);
            updateItemCount();
        });

        $('#list-item').on('click', '.remove-item', function() {
             $(this).closest('.item').remove();
             updateItemCount();
        });

        function updateItemCount() {
            $('#list-item .item').each(function(index) {
                $(this).find('.index').text(index + 1);
            });
        }
    });
</script>
@endpush