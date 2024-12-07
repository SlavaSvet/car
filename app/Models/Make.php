<?php

namespace App\Models;

use App\Models\Model as ModelsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Make extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function models(): HasMany
    {
        return $this->hasMany(ModelsModel::class);
    }
}
