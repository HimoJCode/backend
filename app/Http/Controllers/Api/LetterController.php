<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LetterRequest;
use App\Models\Letter;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $letters = Letter::select('letters.sender', 'letters.created_at', 'letters.subject', 'letters.body');

        if ($request->keyword) {
            $letters->where(function ($query) use ($request) {
                $query->where('letters.sender', 'like', '%' . $request->keyword . '%');
            });
        }

        return $letters->get();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(LetterRequest $request)
    {
        $validated = $request->validated();

        $Letter = Letter::create($validated);

        return $Letter;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Letter::findOrfail($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(LetterRequest $request, string $id)
    {
        $validated = $request->validated();

        $letter = Letter::findOrFail($id);

        $letter->update($validated);

        return $letter;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Letter = Letter::FindOrFail($id);
        $Letter->delete();
        return $Letter;
    }
}
