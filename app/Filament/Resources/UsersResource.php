<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsersResource\Pages;
use App\Filament\Resources\UsersResource\RelationManagers;
use App\Models\User;
use App\Models\userRole;
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
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateTimeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Queries\Concerns\InteractsWithTable;
use Filament\Queries\Concerns\InteractsWithForms;
use Filament\Resources\Resource\getEloquentQuery;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Enums\FiltersLayout;


class UsersResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    TextInput::make('name')
                        ->label('Full Name')
                        ->required(),
                    Select::make('role_id')
                        ->label('Role')
                        ->options(
                            UserRole::where('name', 'amil') // Hanya role "Amil"
                                ->pluck('name', 'id')
                                ->toArray()
                        )
                        ->searchable()
                        ->required(),
                    TextInput::make('email')
                        ->label('Email Address')
                        ->email()
                        ->required(),
                    TextInput::make('username')
                        ->label('Username')
                        ->required(),
                    TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->required()
                        ->confirmed(), // Tambahkan untuk validasi konfirmasi password
                    TextInput::make('password_confirmation')
                        ->label('Confirm Password')
                        ->password()
                        ->required(),
                    Select::make('status')
                        ->label('Status')
                        ->options([
                            'active' => 'Active',
                            'inactive' => 'Inactive',
                        ])
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->limit(30)
                    ->sortable(),
                TextColumn::make('role.name')
                    ->label('Role')
                    ->searchable()
                    ->limit(30)
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->limit(30)
                    ->sortable(),

                TextColumn::make('username')
                    ->label('Username')
                    ->searchable()
                    ->limit(30)
                    ->sortable(),

                ToggleColumn::make('status')
                    ->label('Active')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
                Filter::make('role_id'),
                SelectFilter::make('role_id')
                    ->label('Filter by Role')
                    ->options(
                        UserRole::whereNotIn('name', ['admin', 'amil'])->pluck('name', 'id')->toArray()
                    )
                    ->searchable()
                    ->multiple(),
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

    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()->userAndAmil();
    // }
    // public function scopeUserAndAmil($query)
    // {
    //     return $query->whereHas('role', function ($subQuery) {
    //         $subQuery->whereIn('name', ['user', 'amil']);
    //     });
    // }

    protected static function booted()
    {
        static::updated(function ($program) {
            // Log perubahan nilai `isDone`
            if ($program->isDirty('status')) {
                logger("State diperbarui untuk Program ID {$program->id}: {$program->isDone}");
            }
        });
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUsers::route('/create'),
            'edit' => Pages\EditUsers::route('/{record}/edit'),
        ];
    }
}
