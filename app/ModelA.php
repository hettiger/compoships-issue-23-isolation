<?php

namespace App;

use App\Traits\HasCompositePrimaryKey;
use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;

class ModelA extends Model
{
    use HasCompositePrimaryKey;
    use Compoships;

    const TABLE_NAME = 'model_a';

    const COMPOSITE_KEY = [
        'event_id',
        'event_date',
    ];

    protected $table = self::TABLE_NAME;

    protected $primaryKey = self::COMPOSITE_KEY;

    public function modelB()
    {
        return $this->hasOne(
            ModelB::class,
            ModelB::COMPOSITE_KEY,
            self::COMPOSITE_KEY
        );
    }
}
