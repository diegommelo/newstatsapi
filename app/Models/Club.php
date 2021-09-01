<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;


class Club extends Model
{
    protected $collection = 'clubes';
    protected $keyType = 'int';
}
