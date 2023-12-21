<?php

namespace App\Http\Controllers\Api;

use App\Models\Prompt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PromptRequest;

class PromptController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $messages = Prompt::select('prompts.prompt_id', 'prompts.created_at', 'prompts.message', 'prompts.response', 'prompts.user_id')
            ->join('users', 'prompts.user_id', '=', 'users.id');

        if ($request->keyword) {
            $messages->where(function ($query) use ($request) {
                $query->where('users.name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('messages.message', 'like', '%' . $request->keyword . '%');
            });
        }

        return $messages->get();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PromptRequest $request)
    {
        $validated = $request->validated();

        $prompt = Prompt::create($validated);

        return $prompt;
    }

    public function show(string $id)
    {
        return Prompt::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function update(PromptRequest $request, string $id)
    {
        $validated = $request->validated();

        $prompt = Prompt::findOrFail($id);

        $prompt->update($validated);

        return $prompt;
    }
    public function destroy(string $id)
    {
        $prompt = Prompt::findOrFail($id);

        $prompt->delete();

        return $prompt;
    }
}
