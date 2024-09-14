<?php

namespace App\Http\Controllers;

use App\Http\Requests\VocabularyRequest;
use App\Models\Topic;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Log;

class VocabularyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(VocabularyRequest $request)
    {
        try {
            $topicId = $request->topic_id;
            $payload = $request->validated();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('vocabulary'), $imageName);

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

    /**
     * Display the specified resource.
     */
    public function show(Vocabulary $vocabulary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vocabulary $vocabulary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vocabulary $vocabulary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vocabulary $vocabulary)
    {
        //
    }
}
