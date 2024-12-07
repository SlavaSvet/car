<?php

namespace App\Filament\Resources\TypeVihicleResource\Pages;

use App\Filament\Resources\TypeVihicleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeVihicles extends ListRecords
{
    protected static string $resource = TypeVihicleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
