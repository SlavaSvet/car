<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquetModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Model extends EloquetModel
{
    protected $fillable = [
        'name',
        'make_id',
    ];

    public function make(): BelongsTo
    {
        return $this->belongsTo(Make::class);
    }
}
