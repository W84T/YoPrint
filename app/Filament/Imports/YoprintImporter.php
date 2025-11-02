<?php

namespace App\Filament\Imports;

use App\Models\Yoprint;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class YoprintImporter extends Importer
{
    protected static ?string $model = Yoprint::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('unique_key')
                ->requiredMapping()
                ->guess(['UNIQUE_KEY'])
                ->label(__('Unique Key')),
            ImportColumn::make('product_title')
                ->requiredMapping()
                ->guess(['PRODUCT_TITLE'])
                ->rules(['required']),
            ImportColumn::make('product_description')
                ->requiredMapping()
                ->guess(['PRODUCT_DESCRIPTION'])
                ->rules(['required']),
            ImportColumn::make('style')
                ->requiredMapping()
                ->guess(['STYLE#', 'STYLE'])
                ->rules(['required']),
            ImportColumn::make('sanmar_mainframe_color')
                ->requiredMapping()
                ->guess(['SANMAR_MAINFRAME_COLOR'])
                ->rules(['required']),
            ImportColumn::make('size')
                ->requiredMapping()
                ->guess(['SIZE'])
                ->rules(['required']),
            ImportColumn::make('color_name')
                ->requiredMapping()
                ->guess(['COLOR_NAME'])
                ->rules(['required']),
            ImportColumn::make('piece_price')
                ->requiredMapping()
                ->guess(['PIECE_PRICE'])
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): Yoprint
    {

        $this->data = collect($this->data)->map(function ($value) {
            if (is_string($value)) {
                // Clean broken UTF-8 bytes
                $value = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
                // Decode HTML entities like &#174; into actual symbols
                $value = html_entity_decode($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            }
            return $value;
        })->toArray();


        return Yoprint::firstOrNew([
            'unique_key' => $this->data['unique_key'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your yoprint import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
