<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\Facades\Storage;


class ProfileController extends Controller
{
    //update the image of the specified id from resource.
    public function image(UserRequest $request)
    {
        $user = User::findOrFail($request->user()->id);
        if (!is_null($user->image)) {
            Storage::disk('public')->delete($user->image);
        }
        $user->image = $request->file('image')->StorePublicly('images', 'public');
        $user->save();
        return $user;
    }

    /**
     * Display the specified information of the token bearer.
     */
    public function show(Request $request)
    {
        return $request->user();
    }    
}
