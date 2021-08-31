<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartolaController extends Controller
{
    public function search($team) {
        $response = Http::get(env('CARTOLA_API_URL').'/busca?q='.$team);
        return $response->json();
    }

    public function getTeam($team_id) {
        $response = Http::get(env('CARTOLA_API_URL').'/time/id/'.$team_id);
        return $response->json();
    }
}
