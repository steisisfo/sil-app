<?php

namespace App\Filament\Resources\ResearchGroups\Pages;

use App\Filament\Resources\ResearchGroups\ResearchGroupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListResearchGroups extends ListRecords
{
    protected static string $resource = ResearchGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
