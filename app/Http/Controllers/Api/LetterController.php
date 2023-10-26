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
    public function index()
    {
        return Letter::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
