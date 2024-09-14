<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', Rule::unique(Topic::class, 'name')],
        ]);

        $topic = Topic::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'user_id' => $request->user_id
        ]);

        if ($topic) {
            $length = count($request->english);
            $count = 0;
            for ($i = 0; $i < $length; $i++) {
                if (!empty($request->english[$i]) && !empty($request->vietnamese[$i])) {
                    $payload = [
                        'topic_id' => $topic->id,
                        'english' => $request->english[$i],
                        'vietnamese' => $request->vietnamese[$i]
                    ];
                    if (!empty($request->image[$i])) {
                        $file = $request->image[$i];
                        $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('vocabulary'), $imageName);

                        $payload['image'] = $imageName;
                    }

                    $vocabulary = Vocabulary::create($payload);
                    if ($vocabulary) {
                        $count++;
                    }
                }
            }
            $topic->update([
                'count' => $count
            ]);

            session()->flash('status_create_topic', 'Created topic successfully!');
            return redirect()->back();
        }

        session()->flash('status_create_topic', 'Failed to create topic. Please try again!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $topic = Topic::with('vocabulary')->where(['slug' => $slug])->first();
        if ($topic) {
            return view('guest.topic-detail', compact('topic'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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
                        $file = $request->file("image.{$vocabId}");
                        $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('vocabulary'), $imageName);

                        $payload['image'] = $imageName;
                    }
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $topic = Topic::find($id);
        if ($topic) {
            $topic->delete();
        }
        return redirect()->back();
    }
}
