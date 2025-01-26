<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriProgramResource\Pages;
use App\Filament\Resources\KategoriProgramResource\RelationManagers;
use App\Models\KategoriProgram;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor as ComponentsRichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateTimeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;

class KategoriProgramResource extends Resource
{
    protected static ?string $model = KategoriProgram::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    TextInput::make('nama')
                        ->required(),
                    TextInput::make('group')
                        ->required(),
                    // Forms\Components\TextInput::make('created_by')
                    //     ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('group')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoriPrograms::route('/'),
            'create' => Pages\CreateKategoriProgram::route('/create'),
            'edit' => Pages\EditKategoriProgram::route('/{record}/edit'),
        ];
    }
}
