<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Athlete;
use App\Http\Resources\AthleteResource;

class AthleteController extends Controller
{
    public function getAthleteSeason(Request $request, Athlete $athlete) {
        // $id = (int) $request->id;
        // $season = $request->season;
        // $data = $athlete->where('_id', $id)
        //     ->where('info-'.$season, 'exists', true)
        //     ->where('dados-'.$season, 'exists', true)
        //     ->with('position')
        //     ->project(['info-'.$season => 1, 'dados-'.$season => 1,'posicao_id' => 1])
        //     ->get();
        $id = (int) $request->id;
        $season = $request->season;
        $data = $athlete->getAthleteSeason($id, $season);
        return new AthleteResource($data);
    }
}
