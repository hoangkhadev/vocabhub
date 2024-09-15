<?php

namespace App\Http\Controllers;

use App\Models\Topic;

class TestController extends Controller
{
    public function index()
    {
        $user_id = request()->route('user');
        $topic_slug = request()->route('topicname');
        $topic = Topic::where(['slug' => $topic_slug, 'user_id' => $user_id])->first();

        if ($topic) {
            $vocabularies = $topic->vocabulary()->get();
            return view('guest.topic-test', compact('vocabularies', 'topic'));
        }
    }
}
