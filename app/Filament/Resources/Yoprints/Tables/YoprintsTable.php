<?php

namespace App\Filament\Resources\Yoprints\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class YoprintsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('unique_key')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('product_title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('product_description')
                    ->searchable(),
                TextColumn::make('style')
                    ->searchable(),
                TextColumn::make('sammar_mainframe_color')
                    ->searchable(),
                TextColumn::make('size')
                    ->searchable(),
                TextColumn::make('color_name')
                    ->searchable(),
                TextColumn::make('price_price')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
