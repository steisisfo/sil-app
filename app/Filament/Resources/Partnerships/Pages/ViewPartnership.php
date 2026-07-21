<?php

namespace App\Filament\Resources\Partnerships\Pages;

use App\Filament\Resources\Partnerships\PartnershipResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPartnership extends ViewRecord
{
    protected static string $resource = PartnershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
