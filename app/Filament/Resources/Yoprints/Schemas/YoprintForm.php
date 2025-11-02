<?php

namespace App\Filament\Resources\Yoprints\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class YoprintForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('unique_key')
                    ->required(),
                TextInput::make('product_title')
                    ->required(),
                TextInput::make('product_description')
                    ->required(),
                TextInput::make('style')
                    ->required(),
                TextInput::make('sammar_mainframe_color')
                    ->required(),
                TextInput::make('size')
                    ->required(),
                TextInput::make('color_name')
                    ->required(),
                TextInput::make('price_price')
                    ->required(),
            ]);
    }
}
