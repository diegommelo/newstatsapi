<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Position extends Model
{
    protected $collection = 'posicoes';
    protected $keyType = 'int';
}
