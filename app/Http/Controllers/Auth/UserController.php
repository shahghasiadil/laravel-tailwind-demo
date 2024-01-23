<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

use Illuminate\Session\Store;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {

        $action_icons = [
            "icon:eye | color:primary | click:redirect('/users/{id}')",
        ];
        return view('users.index', [
            'action_icons'=>$action_icons,
            'captions'=>['name'=>__('Name'), 'email'=>__('Email'), 'dob'=>'Birth date', 'locale'=>__('Language')],
            'users' => User::query()->paginate(5),
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $attributes = $request->validated();

        $user = User::create($attributes);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $attributes = $request->validated();

        $user->update($attributes);


        return redirect()->route('users.index')->with('success', 'User edited successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }


}
