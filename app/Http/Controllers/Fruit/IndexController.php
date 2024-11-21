<?php

namespace App\Http\Controllers\Fruit;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\Fruit\FruitResource;
use App\Models\Fruit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Tymon\JWTAuth\Facades\JWTAuth;

class IndexController extends Controller
{
//    public function __invoke()
//    {
//        return view('index');
//    }

    public function index()
    {
//        $user = JWTAuth::user();
        $fruits = Fruit::all();
//        return response()->json([
//            'user' => $user, // Данные о пользователе
//            'fruits' => FruitResource::collection($fruits), // Коллекция фруктов
//        ]);

//        dd($fruits);
        return FruitResource::collection($fruits);
    }
}
