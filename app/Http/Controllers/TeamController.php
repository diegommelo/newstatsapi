<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Resources\Team as TeamResource;

class TeamController extends Controller
{
    public function search(Request $request) {
        return 1;
    }

    public function getTeamSeason(Request $request, Team $team) {
        $data = $team->getTeamSeason($request->id, $request->season);
        return TeamResource::collection($data);
    }
}
