<?php

namespace App\Http\Controllers\Api;

use App\Models\CarouselItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CarouselItemRequest;


class CarouselItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CarouselItem::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CarouselItemRequest $request)
    {
        //retrieve the validated input data
        $validated = $request->validated();

        $CarouselItem = CarouselItem::create($validated);

        return $CarouselItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CarouselItem::findOrfail($id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(CarouselItemRequest $request, string $id)
    {
        $validated = $request->validated();

        $carouselItem  = CarouselItem::findOrFail($id);
        $carouselItem->update($validated);

        return $carouselItem;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $CarouselItem = CarouselItem::FindOrFail($id);
        $CarouselItem->delete();
        return $CarouselItem;
    }
}
