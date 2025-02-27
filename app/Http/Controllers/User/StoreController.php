<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class StoreController extends Controller
{
//    public function __invoke()
//    {
//        return view('index');
//    }

    public function index(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::where('email', $data['email'])->first();

        if ($user) return response(['message' => 'User already exists.']);
        $user = User::create($data);


        $token = auth()->tokenById($user->id);

        return response(['access_token' => $token]);
    }
}
