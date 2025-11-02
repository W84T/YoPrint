<?php

namespace App\Filament\Resources\Yoprints\Pages;

use App\Filament\Imports\YoprintImporter;
use App\Filament\Resources\Yoprints\YoprintResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListYoprints extends ListRecords
{
    protected static string $resource = YoprintResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
            ->importer(YoprintImporter::class)
                ->chunkSize(50)
            ->color('primary'),
//            CreateAction::make(),
        ];
    }
}
