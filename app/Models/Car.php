<?php

namespace App\Models;

use App\Models\Model as ModelsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Car extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'model_id',
        'type_vihicle_id',
        'vin',
        'price',
        'year',
    ];

    public function model(): BelongsTo
    {
        return $this->belongsTo(ModelsModel::class);
    }

    public function typeVihicle(): BelongsTo
    {
        return $this->belongsTo(TypeVihicle::class);
    }

    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }

    public function getImage(): ?Media
    {
        return $this->getFirstMedia('image');
    }
}
