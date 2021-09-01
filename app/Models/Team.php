<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Team extends Model
{
    protected $collection = 'c2016';
    protected $keyType = 'int';
    protected $primaryKey = 'team_id';

    public function getTeamSeason($id, $season) {
        $team = $this->where('time_id', (int) $id)
        ->where('historicos-'.$season, 'exists', true)
        ->where('info-'.$season, 'exists', true)
        ->project(['capitaes-'.$season => 1, 'historicos-'.$season => 1, 'info-'.$season => 1, 'time_id' => 1])
        ->get();

        $team->transform(function($item, $key) use ($season) {
            $item['historicos'] = $item['historicos-'.$season];
            $item['info'] = $item['info-'.$season];
            if($item['capitaes-'.$season]) {
                $item['capitaes'] = $item['capitaes-'.$season];
            }
            $item['time_id'] = $item['time_id'];
            $item['season'] = (int) $season;
            unset($item['historicos-'.$season]);
            unset($item['info-'.$season]);
            unset($item['capitaes-'.$season]);
            return $item;
        });
        return $team;
    }


}
