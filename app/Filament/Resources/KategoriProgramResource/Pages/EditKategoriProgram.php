<?php

namespace App\Filament\Resources\KategoriProgramResource\Pages;

use App\Filament\Resources\KategoriProgramResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriProgram extends EditRecord
{
    protected static string $resource = KategoriProgramResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
