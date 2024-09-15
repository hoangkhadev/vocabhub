<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Models\Topic;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Log;
use Str;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::where('user_id', auth()->user()->id)->get();
        return view('guest.topic', compact('topics'));
    }

    public function create()
    {
        return view('guest.topic-create');
    }

    public function store(TopicRequest $request)
    {
        try {
            // Tạo topic mới
            $topic = Topic::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'user_id' => auth()->id(),
            ]);

            if (!empty($request->english[0])) {
                // Xử lý từ vựng và hình ảnh
                $count = 0;
                foreach ($request->english as $key => $englishWord) {
                    $vocabularyData = [
                        'topic_id' => $topic->id,
                        'english' => $englishWord,
                        'vietnamese' => $request->vietnamese[$key],
                    ];

                    // Xử lý ảnh nếu có
                    if ($request->hasFile("image.$key")) {
                        $file = $request->file("image.$key");
                        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path() . "/vocabulary/$topic->id", $fileName);
                        $vocabularyData['image'] = $fileName;
                    }

                    Vocabulary::where(['topic_id' => $topic->id])->create($vocabularyData);
                    $count++;
                }
                $topic->update(['count' => $count]);
            }
            return response()->json([
                'success' => true,
                'message' => 'Create topic successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to create topic', [
                'error' => $e->getMessage(),
                'line' => $e->getTrace(),
                'file' => $e->getFile()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Tạo không thành công'
            ], 500);
        }
    }

    public function show(string $slug)
    {
        $topic = Topic::with('vocabulary')->where(['slug' => $slug])->first();
        if ($topic) {
            return view('guest.topic-detail', compact('topic'));
        }
    }

    public function update(Request $request)
    {
        $name = $request->name;
        $max_score = $request->maxscore;
        $id = $request->id;
        $user_id = auth()->user()->id;
        if ($name) {
            $check = Topic::where(['id' => $id, 'user_id' => $user_id])->update([
                'name' => $name,
                'slug' => Str::slug($name)
            ]);
        }
        if ($max_score) {
            $check = Topic::where(['id' => $id, 'user_id' => $user_id])->update([
                'max_score' => $max_score,
            ]);
        }

        return response()->json(['success' => true, 'data' => $request->check]);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $topic = Topic::find($id);
        if ($topic) {
            if ($this->deleteDirectory(public_path() . "/vocabulary/$id")) {
                $topic->delete();
            }
        }
        return redirect()->back();
    }

    private function deleteDirectory($dir)
    {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir);
        }

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }

        return rmdir($dir);
    }
}
