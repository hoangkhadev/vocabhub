<?php

namespace App\Http\Controllers;

use App\Http\Requests\VocabularyRequest;
use App\Models\Topic;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Log;

class VocabularyController extends Controller
{
    public function store(VocabularyRequest $request)
    {
        try {
            $topicId = $request->topic_id;
            $payload = $request->validated();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . "/vocabulary/$topicId", $imageName);

                $payload['image'] = $imageName;
            }
            $payload['topic_id'] = $topicId;
            $vocabulary = Vocabulary::create($payload);

            $count = Vocabulary::where(['topic_id' => $topicId])->count();
            Topic::find($topicId)->update(['count' => $count]);
            return response()->json([
                'success' => true,
                'data' => $vocabulary,
                'message' => 'Thành công'
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to create  vocabulary: ', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $id = $request->id;
            $topic = Topic::find($id);
            if ($topic) {
                foreach ($request->vocabularyIds as $vocabId) {
                    $payload = [
                        'english' => $request->input("english.$vocabId"),
                        'vietnamese' => $request->input("vietnamese.$vocabId"),
                    ];
                    if ($request->hasFile("image.$vocabId")) {
                        $vocabulary = Vocabulary::find($vocabId);

                        //Xóa ảnh cũ nếu tồn tại
                        if ($vocabulary->image) {
                            $oldImage = public_path() . "/vocabulary/$topic->id/" . $vocabulary->image;
                            if (file_exists($oldImage)) {
                                unlink($oldImage);
                            }
                        }

                        //Lưu ảnh mới
                        $file = $request->file("image.{$vocabId}");
                        $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path() . "/vocabulary/$topic->id", $imageName);

                        $payload['image'] = $imageName;
                    }

                    //Cập nhật thông tin vocabulary
                    Vocabulary::where(['id' => $vocabId, 'topic_id' => $id])->update($payload);
                }
            }
            return response()->json([
                'success' => true,
                'data' => $request->all()
            ]);
        } catch (\Exception $e) {
            Log::error("Failed to update topic: ", [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Fail'
            ], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->id;
            $topicId = $request->topic_id;
            $userId = $request->user_id;

            if (
                auth()->user()->id == $userId &&
                Topic::find($topicId) &&
                $vocabulary = Vocabulary::find($id)
            ) {
                //Nếu có ảnh thì unlink ảnh
                if ($vocabulary->image) {
                    unlink(public_path() . "/vocabulary/$topicId/" . $vocabulary->image);
                }

                $vocabulary->delete();
                $count = $vocabulary->where(['topic_id' => $topicId])->count();
                Topic::find($topicId)->update(['count' => $count]);
                return response()->json([
                    'succes' => true,
                    'message' => 'Xóa thành công'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Xóa không thành công'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Failed to delete vocabulary: ', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Xóa không thành công'
            ], 500);
        }
    }
}
