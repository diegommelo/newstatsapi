<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;


class Athlete extends Model
{
    protected $collection = 'atletas';
    protected $primaryKey = '_id';
    protected $keyType = 'int';
    
    public function getAthleteSeason($id, $season) {
        $athlete = $this->where('_id', $id)
        ->where('info-'.$season, 'exists', true)
        ->where('dados-'.$season, 'exists', true)
        ->project(['info-'.$season => 1, 'dados-'.$season => 1, 'posicao_id' => '$info-'.$season.'.posicao_id', 'clube_id' => '$info-'.$season.'.clube_id'])
        ->with('position')
        ->with('club')
        ->get();

        $athlete->transform(function($item, $key) use ($season) {
            $item['info'] = $item['info-'.$season];
            $item['dados'] = $item['dados-'.$season];
            $item['season'] = (int) $season;
            $item['id'] = $item['_id'];
            unset($item['info-'.$season]);
            unset($item['dados-'.$season]);
            return $item;
        });
        
        return $athlete;
    }

    public function position() {
        return $this->hasOne(Position::class, '_id', 'posicao_id');
    }

    public function club() {
        return $this->hasOne(Club::class, '_id', 'clube_id');
    }
}
