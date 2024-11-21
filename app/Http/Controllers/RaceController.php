<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\RaceTracking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class RaceController extends Controller
{
    public function index(Request $request)
    {
        $race = Race::all();
        return response()->json($race);
    }

    public function show(Request $request, $id)
    {
        $race = Race::find($id);

        return response()->json($race);
    }

    public function store(Request $request)
    {
//        dd($request->input());
        $validated = $request->validate([
            'distance_goal' => 'required|numeric',
            'distance_done' => 'required|numeric',
            'open_date' => 'required|date',
            'close_date' => 'required|date',
        ]);

//        dd($validated);
        $race = Race::create($validated);

        return response()->json($race, 201);
    }

    public function destroy(Request $request, $id = null)
    {
        if ($id === null) {
            return response()->json(['message' => 'ID is required to delete a race'], 400);
        }

        $race = Race::find($id);

        if (!$race) {
            return response()->json(['message' => "Race with ID {$id} not found"], 404);
        }

        $race->delete();

        return response()->json(['message' => 'Race deleted successfully']);
    }

    public function update(Request $request, $id = null)
    {
        // Получаем ID пользователя
        $userID = JWTAuth::user()->id;

        if ($id === null) {
            return response()->json(['message' => 'ID is required to update a race'], 400);
        }

        // Находим забег по ID
        $race = Race::find($id);

        // Если забег не найден, возвращаем ошибку
        if (!$race) {
            return response()->json(['message' => 'Race not found'], 404);
        }
        $validated = $request->validate([
            'distance_done' => 'required|numeric|min:0'
        ]);

        $race->distance_done += $validated['distance_done'];
        $race->save();

        // Сразу же записываем в races_tracking информацию о том, что был коммит с новым расстоянием
        RaceTracking::create([
            'race_id' => $id,
            'user_id' => $userID,
            'distance_commit' => $validated['distance_done'],
            'date_commit' => Carbon::now(),

        ]);

        return response()->json(['message' => 'Race updated successfully', 'race' => $race]);
    }

}
