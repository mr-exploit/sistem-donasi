<?php

namespace App\Filament\Resources\KategoriProgramResource\Pages;

use App\Filament\Resources\KategoriProgramResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriPrograms extends ListRecords
{
    protected static string $resource = KategoriProgramResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
