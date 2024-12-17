<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('model_id')
                    ->relationship('model', function ($query) {
                        $query->select('models.id', DB::raw('CONCAT(makes.name, " ", models.name) as name'))
                            ->join('makes', 'models.make_id', '=', 'makes.id');
                    })
                    ->required(),
                Forms\Components\Select::make('type_vihicle_id')
                    ->relationship('typeVihicle', 'name')
                    ->required(),
                Forms\Components\TextInput::make('vin')
                    ->required()
                    ->maxLength(17),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->integer(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                    ->image()
                    ->required()
                    ->collection('image')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('model.name'),
                Tables\Columns\TextColumn::make('typeVihicle.name'),
                Tables\Columns\TextColumn::make('vin'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('year'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
