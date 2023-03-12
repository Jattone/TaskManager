<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::make(
            $request->safe()->toArray()
        );

        $user->password = Hash::make($request->safe()->password);

        $user->save();
        $user->refresh();
        
        return [
            "message" => "User created.",
            "user"    => new UserResource($user)
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return [
            "message" => "User found.",
            "user"    => new UserResource($user),
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update(
            $request->safe()->toArray(),
        );

        return [
            "message" => "User updated.",
            "user"    => new UserResource($user),
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return [
            "message" => "User deleted.",
        ];
    }
}
