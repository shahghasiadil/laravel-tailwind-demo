<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users', [
           'users' => User::all(),
        ]);
    }

    public function create()
    {
        return view('users-create');
    }

    public function store(StoreUserRequest $request)
    {
        $attributes = $request->validated();

        User::create([
            ...$attributes
        ]);
    }

}
