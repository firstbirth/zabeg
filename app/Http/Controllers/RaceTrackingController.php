<?php

namespace App\Http\Controllers;

use App\Models\RaceTracking;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class RaceTrackingController extends Controller
{
    public function index(Request $request, $id)
    {

        $userID = JWTAuth::user()->id;

        $totalDistanceCommit = RaceTracking::where('user_id', $id)
            ->sum('distance_commit');
//        dd($totalDistanceCommit);

        return response()->json(['userID' => $userID, 'totalDistanceCommitted' => $totalDistanceCommit]);
    }

    public function feed(Request $request, $raceId)
    {
        $userID = JWTAuth::user()->id;
//        dd($userID);

        $raceTracking = RaceTracking::with(['user', 'race']) // Загружаем связанные модели
        ->where('user_id', $userID)
            ->where('race_id', $raceId)
            ->get(); // Получаем первое совпадение

        if ($raceTracking->isEmpty()) {
            return response()->json(['raceTracking' => ['Race data not found']]);
        }

        return response()->json(['raceTracking' => $raceTracking]);
    }
}
