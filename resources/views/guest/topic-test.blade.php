@extends('layouts.app')
@section('title', 'Kiểm tra - Test')
@section('content')
<div class="container mx-auto px-4 py-8">
    @csrf
    <div id="test-container" class="max-w-md mx-auto shadow-menu rounded-xl overflow-hidden md:max-w-2xl">
        <div class="p-8">
            <h2 class="text-2xl font-bold mb-4 text-blue-500">Testing</h2>
            <div class="flex items-center gap-x-2">
                <p class="text-lg font-medium text-white">Vietnamese: </p>
                <p id="vietnamese" class="text-xl font-semibold text-amber-500"></p>
            </div>
            <div class="hidden" id="image-show">
                <p class="text-white font-medium">Image:</p>
                <img id="image" class="rounded-md" height="60" width="60" alt="">
            </div>
            <div class="space-y-4 mt-4">
                <input type="text" id="english"
                    class="w-full px-3 py-2 text-black border rounded-lg focus:outline-none focus:border-blue-500"
                    placeholder="Type english" autofocus autocomplete="off">
                <div class="flex space-x-2">
                    <button id="check-btn"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">Check
                    </button>
                    <button id="skip-btn"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition">Skip</button>
                </div>
            </div>
            <p id="result" class="mt-4 font-bold"></p>
            <p id="progress" class="mt-2 text-white"></p>
        </div>
    </div>
</div>

@endsection
@push('js')
<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });
    const vocabularies = @json($vocabularies);
    const topicId = @json($topic->id);
    

    let currentIndex = 0;
    let correctCount = 0;

    function loadWord() {
        if (currentIndex < vocabularies.length) {
            $('#vietnamese').text(vocabularies[currentIndex].vietnamese);
            $('#english').val('');
            $('#result').text('');
            if(vocabularies[currentIndex].image) {
                $('#image-show').show();
                $('#image').attr('src', `/vocabulary/${topicId}/${vocabularies[currentIndex].image}`);
            } else {
                $('#image-show').hide();
            }
            updateProgress();
        } else {
            showFinalResult();
        }
    }

    //Kiểm tra kết quả
    function checkAnswer() {
        const userInput = $('#english').val().trim().toLowerCase();
        const correctAnswer = vocabularies[currentIndex].english.toLowerCase();
        
        if (userInput === correctAnswer) {
            $('#result').text('Correct!');
            $('#result').removeClass('text-red-500');
            $('#result').addClass('text-green-500');
            correctCount++;
            currentIndex++;
            setTimeout(loadWord, 1000);
        } else {
            $('#result').text('Wrong. Try again!') ;
            $('#result').removeClass('text-green-500');
            $('#result').addClass('text-red-500');
        }
    }

    //Bỏ qua từ hiện tại
    function skipWord() {
        currentIndex++;
        loadWord();
    }

    //Cập nhật tiến độ
    function updateProgress() {
        $('#progress').text(`Tiến độ: ${currentIndex + 1}/${vocabularies.length}`);
    }

    //Hiển thị kết quả kiểm tra
    function showFinalResult() {
        $('#test-container').append(`
            <div class="px-8 py-2">
                <h2 class="text-xl font-bold mb-4 text-white">You have completed this test, good job!</h2>
                <p class="mb-4 text-white"><span class="text-blue-500 font-medium">Your score:</span> ${correctCount}/${vocabularies.length}.</p>
                <div class="flex items-center gap-x-2">
                    <button onclick="location.reload()" class="px-4 py-2 mb-4 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">Repeat this test</button>
                    <a href="{{route('guest.topic')}}" class="px-4 py-2 mb-4 border border-blue-500 text-blue-500 rounded hover:shadow-blue-400 shadow-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">Back to your topics</a>
                </div>
            </div>
        `);
        $.ajax({
            type: "POST",
            url: "{{route('guest.topic.update')}}",
            data: {id: topicId, maxscore: correctCount},
            success: function (response) {
                console.log(response);
            }
        });
    }

    //Gắn sự kiện
    $('#check-btn').on('click', checkAnswer);
    $('#skip-btn').on('click', skipWord);

    //Kiểm tra người dùng nhấn phím enter
    $('#english').on('keypress', function(e) {
        if (e.key === 'Enter') {
            checkAnswer();
        }
    });

loadWord();
</script>
@endpush