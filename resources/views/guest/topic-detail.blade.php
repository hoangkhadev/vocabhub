@extends('layouts.app')
@section('title', 'Luyện tập - Pratice')
@section('content')
<div class="flex justify-between items-center">
    <div>
        <span class="text-3xl font-semibold mb-4 text-blue-500">Topic: </span>
        <input id="topic_name"
            class="text-3xl font-semibold bg-transparent outline-none focus:border-b focus:border-b-amber-400 mb-4"
            type="text" name="topic_name" value="{{$topic->name }}" spellcheck="false">
    </div>
    <div class="flex items-center gap-4">
        <button type="button" id="btn-add-vocab"
            class="flex items-center gap-1 border-2 text-amber-500 border-amber-500 hover:shadow-menu hover:shadow-amber-500 hover:scale-105 duration-200 py-2 px-2 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <p>Add vocabulary</p>
        </button>
        <a href="{{route('guest.test.show', ['user' => auth()->user()->id, 'topicname' => $topic->slug])}}"
            id="btn-test"
            class="hidden items-center gap-1 border-2 text-blue-500 border-blue-500 hover:shadow-menu hover:shadow-blue-500 hover:scale-105 duration-200 py-2 px-6 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
            </svg>
            <span class="font-medium text-base">Test</span>
        </a>
    </div>
</div>
<div id="empty-vocab" class="w-fit mx-auto my-10">
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
    <p class="text-lg font-medium w-full text-center">Don't have any vocabulary now</p>
</div>
<form method="POST" id="vocab" enctype='multipart/form-data'>
    @csrf
    <input type="text" name="id" id="id" value="{{$topic->id}}" hidden>
    <div class="grid grid-cols-2 gap-4 mb-3" id="list-vocab">
        @foreach ($topic->vocabulary as $index => $item)
        <div class="bg-secondary rounded-xl parent">
            <input type="text" name="vocabularyId" value="{{$item->id}}" hidden>
            <div class="flex justify-between items-center border-b-2 border-b-gray-800 py-4 px-4">
                <span class="text-base font-medium">{{ ++$index }}</span>
                <div class="flex items-center gap-4">
                    <div class="edit py-1 px-2 -mx-2 hover:bg-slate-700 text-amber-400 rounded-lg cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </div>

                    <div class="delete py-1 px-2 -mx-2 hover:bg-slate-700 text-red-400 rounded-lg cursor-pointer">
                        <input type="text" value="{{$topic->id}}" name="topicId" hidden>
                        <input type="text" value="{{$item->id}}" name="vocabId" hidden>
                        <input type="text" value="{{auth()->user()->id}}" name="userId" hidden>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="px-4 flex items-center gap-x-5">
                <div class="w-1/2 py-6">
                    <input type="text" placeholder="Enter English" name="english[{{$item->id}}]"
                        class="bg-transparent border-b-2 focus:border-b-amber-400 transition-all duration-300 outline-none text-white w-full mb-1 h-10"
                        value="{{$item->english}}" disabled>
                    <p class="text-xs font-medium text-cyan-400">ENGLISH</p>
                </div>
                <div class="w-1/2 py-6">
                    <input type="text" placeholder="Enter English" name="vietnamese[{{$item->id}}]"
                        class="bg-transparent border-b-2 focus:border-b-amber-400 transition-all duration-300 outline-none text-white w-full mb-1 h-10"
                        value="{{$item->vietnamese}}" disabled>
                    <p class="text-xs font-medium text-cyan-400">VIETNAMESE</p>
                </div>
                <div class="border-dashed border-2 p-1 rounded-md group">
                    @if (!empty($item->image))
                    <label for="image-{{$item->id}}">
                        <img src="{{asset('vocabulary/' . $topic->id . '/' . $item->image)}}" height="60" width="60"
                            alt="">
                        <input type="file" id="image-{{$item->id}}" name="image[{{$item->id}}]" hidden disabled>
                    </label>
                    @else
                    <label for="image" class="flex flex-col items-center group-hover:text-amber-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-[10px] font-medium">IMAGE</span>
                        <input type="file" id="image" name="image[{{$item->id}}]" hidden disabled>
                    </label>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</form>

<div id="overlay" class="bg-overlay fixed top-0 left-0 bottom-0 right-0 z-[1] hidden"></div>
<div id="overlay-2" class="bg-overlay fixed top-0 left-0 bottom-0 right-0 z-[1] hidden"></div>

<!-- Form add vocabulary -->
<form method="POST" enctype="multipart/form-data" id="form-add-vocab"
    class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 hidden z-[2]">
    @csrf
    <div class="bg-secondary rounded-xl w-96 py-4 px-4">
        <h3 class="py-3 font-medium text-xl"><span class="text-blue-500">Add</span> vocabulary</h3>
        <input type="text" name="topic_id" value="{{$topic->id}}" hidden>
        <div>
            <div class="w-full mb-4">
                <input type="text" placeholder="Enter English" name="english"
                    class="bg-transparent border-b-2 focus:border-b-amber-400 transition-all duration-300 outline-none text-white w-full mb-1 h-10"
                    autocomplete="off">
                <p class="text-xs font-medium text-cyan-400">ENGLISH</p>
                <p id="errEnglish" class="text-red-400 text-sm"></p>
            </div>
            <div class="w-full mb-4">
                <input type="text" placeholder="Enter Vietnamese" name="vietnamese"
                    class="bg-transparent border-b-2 focus:border-b-amber-400 transition-all duration-300 outline-none text-white w-full mb-1 h-10"
                    autocomplete="off">
                <p class="text-xs font-medium text-cyan-400">VIETNAMESE</p>
                <p id="errVietnamese" class="text-red-400 text-sm"></p>
            </div>
            <label for="image" class="group cursor-pointer mb-4 block">
                <div
                    class="flex flex-col items-center rounded-md group-hover:text-amber-400 group-hover:border-amber-400 border-dashed border-2 duration-200 py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    <span class="text-[10px] font-medium">IMAGE</span>
                </div>
                <input type="file" name="image" id="image" hidden>
            </label>
        </div>
        <button
            class="py-2 px-4 rounded-md bg-blue-600 text-white hover:bg-blue-700 w-full font-medium duration-200">Add</button>
    </div>
</form>
@endsection
@push('js')
<script>
    $(document).ready(function () {

        $('#topic_name').on('input', function(e) {
            const name = $(this).val();
            const topicId = @json($topic->id);
            $.ajax({
                type: "POST",
                url: "{{route('guest.topic.update')}}",
                data: {name: name, id: topicId},
                // dataType: "dataType",
                success: function (response) {
                    console.log(response);
                }
            });
        });

        if($('#list-vocab .parent').length > 0) {
            $('#empty-vocab').hide();
            $('#btn-test').removeClass('hidden');
            $('#btn-test').addClass('flex');
        } else {
            $('#empty-vocab').show();
            $('#btn-test').removeClass('flex');
            $('#btn-test').addClass('hidden');
        }

        $('#btn-test').on('click', function(e) {
            if($('#list-vocab .parent').length <= 0) {
                e.preventDefault();
                location.reload();
            }
        })

        //Cấu hình CSRF khi gọi ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        //Biến kiểm tra người dùng có ấn vào chỉnh sửa không
        let activeParent = null;
        //Gắn sự kiện cho các phần tử chỉnh sửa
        $('#vocab').on('click', '.edit', function(e) {
            const parent = $(this).closest('.parent');
            parent.addClass('duration-300 fixed top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 z-[2]');
            $("#overlay").show();
            parent.find('input').prop('disabled', false);
            parent.find('input')[0].focus();
            parent.find('input[type="file"]').addClass('cursor-pointer');
            activeParent = parent;
        });

        //Xử lý click chung
        $(document).on('click', function(e) {
            //Xử lý khi người dùng click vào chỉnh sửa và click ra khỏi vùng chỉnh sửa
            if (e.target.closest('.parent') !== activeParent?.[0]) {
                if(activeParent) {
                    //Xử lý call Ajax cập nhập dữ liệu
                    const formData = new FormData();

                    formData.append('id', $('#id').val());

                    $(".parent").each(function() {
                        const vocabId = $(this).find('input[name="vocabularyId"]').val();
                        formData.append('vocabularyIds[]', vocabId);
                        formData.append(`english[${vocabId}]`, $(this).find('input[name^="english"]').val());
                        formData.append(`vietnamese[${vocabId}]`, $(this).find('input[name^="vietnamese"]').val());

                        const imageFile = $(this).find('input[type="file"]')[0].files[0];
                        if (imageFile) {
                            formData.append(`image[${vocabId}]`, imageFile);
                        }
                    });

                    $.ajax({
                        url: "{{route('guest.vocabulary.update')}}", 
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            location.reload();
                        },
                        error: function(errorThrown) {
                            console.error('Có lỗi xảy ra khi gửi dữ liệu:', errorThrown);
                        }
                    });
    
                    //Ẩn phần chỉnh sửa sau khi chỉnh sửa xong
                    activeParent?.find('input').prop('disabled', true);
                    activeParent?.removeClass('fixed top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 z-[2]');
                    $("#overlay").hide();
                    activeParent = null;
                }
            }

            //Xử lý sau khi người dùng click vào thêm vocabulary
            if(e.target.closest('#btn-add-vocab') !== $('#btn-add-vocab')[0] && 
                e.target.closest('#form-add-vocab') !== $('#form-add-vocab')[0] ) {
                $('#overlay-2').hide();
                $('#form-add-vocab').hide();
            }
        });

        //Xử lý show form thêm vocabulary
        $('#btn-add-vocab').on('click', function() {
            $('#overlay-2').show();
            $('#form-add-vocab').show();
            $('#form-add-vocab').find('input[name="english"]').focus();
        });

        //Xử lý thêm vocabulary
        $('#form-add-vocab').on('submit', function(e) {
            e.preventDefault();
            const topic_id = $(this).find('input[name="topic_id"]').val();
            const english = $(this).find('input[name="english"]').val();
            const vietnamese = $(this).find('input[name="vietnamese"]').val();
            const form = e.target;
            const formData = new FormData(form);

           $.ajax({
            type: "POST",
            url: "{{route('guest.vocabulary.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                location.reload();
            },
            error: function(errorThrown) {
                const status = errorThrown.status;
                if(status === 422) {
                    const errors = errorThrown.responseJSON.errors;
                    if(errors) {
                        const errEnglish = errors.english?.[0] ?? "";
                        const errVietnamese = errors.vietnamese?.[0] ?? "";

                        if(errEnglish) {
                            $('#form-add-vocab').find('input[name="english"]').focus();
                        } else {
                            $('#form-add-vocab').find('input[name="vietnamese"]').focus();
                        }
                        $('#errEnglish').text(errEnglish);

                        $('#errVietnamese').text(errVietnamese);
                    }
                }
                console.error('Có lỗi xảy ra khi gửi dữ liệu:', errorThrown);
            }
           });
        });

        //Xử lý xóa vocabulary
        $('#vocab').on('click', '.delete', function() {
            const vocabId = $(this).find('input[name="vocabId"]').val();
            const topicId = $(this).find('input[name="topicId"]').val();
            const userId = $(this).find('input[name="userId"]').val();
    
            const formData = new FormData();
            formData.append('id', vocabId);
            formData.append('topic_id', topicId);
            formData.append('user_id', userId);

            $.ajax({
                type: "POST",
                url: "{{route('guest.vocabulary.destroy')}}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    location.reload();
                },
                error: function(err) {
                    console.error(err);
                }
            });
        });
    });
</script>
@endpush