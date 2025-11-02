<?php

namespace App\Filament\Resources\Yoprints\Pages;

use App\Filament\Resources\Yoprints\YoprintResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditYoprint extends EditRecord
{
    protected static string $resource = YoprintResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
