<?php

namespace App\Filament\Resources\TypeVihicleResource\Pages;

use App\Filament\Resources\TypeVihicleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeVihicle extends EditRecord
{
    protected static string $resource = TypeVihicleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
