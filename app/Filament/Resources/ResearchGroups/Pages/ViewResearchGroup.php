<?php

namespace App\Filament\Resources\ResearchGroups\Pages;

use App\Filament\Resources\ResearchGroups\ResearchGroupResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewResearchGroup extends ViewRecord
{
    protected static string $resource = ResearchGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
