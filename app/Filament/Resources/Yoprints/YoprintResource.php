<?php

namespace App\Filament\Resources\Yoprints;

use App\Filament\Resources\Yoprints\Pages\CreateYoprint;
use App\Filament\Resources\Yoprints\Pages\EditYoprint;
use App\Filament\Resources\Yoprints\Pages\ListYoprints;
use App\Filament\Resources\Yoprints\Schemas\YoprintForm;
use App\Filament\Resources\Yoprints\Tables\YoprintsTable;
use App\Models\Yoprint;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class YoprintResource extends Resource
{
    protected static ?string $model = Yoprint::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return YoprintForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return YoprintsTable::configure($table);
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
            'index' => ListYoprints::route('/'),
            'create' => CreateYoprint::route('/create'),
            'edit' => EditYoprint::route('/{record}/edit'),
        ];
    }
}
