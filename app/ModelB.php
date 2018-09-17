<?php

namespace App;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;

class ModelB extends Model
{
    use Compoships;

    const TABLE_NAME = 'model_b';

    const COMPOSITE_KEY = [
        'event_id',
        'event_date',
    ];

    protected $table = self::TABLE_NAME;

    public function modelA()
    {
        return $this->hasOne(
            ModelA::class,
            ModelA::COMPOSITE_KEY,
            self::COMPOSITE_KEY
        );
    }
}
