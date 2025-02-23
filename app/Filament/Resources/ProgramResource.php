<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\RelationManagers;
use App\Models\Program;
use App\Models\KategoriProgram;
use Filament\Forms;
use App\Models\User;
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
use Illuminate\Support\Str;
use function Laravel\Prompts\select;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function getModelLabel(): string
    {
        return 'Program';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Program';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    TextInput::make('nama')
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                    TextInput::make('slug')
                        ->disabled()
                        ->required(),
                    Select::make('kategori_id')
                        ->label('Kategori') // Label untuk field
                        ->options(
                            KategoriProgram::where('group', 'programs')
                                ->pluck('nama', 'id')
                                ->toArray()
                        )
                        ->searchable()
                        ->required(),
                    Select::make('kecamatan')
                        ->options([
                            'batu aji' => 'Batu Aji',
                            'batam kota' => 'Batam Kota',
                            'bengkong' => 'Bengkong',
                            'batu ampar' => 'Batu Ampar',
                            'nongsa' => 'Nongsa',
                            'bulang' => 'Bulang',
                            'galang' => 'Galang',
                            'lubuk baja' => 'Lubuk Baja',
                            'sei beduk' => 'Sei Beduk',
                            'sekupang' => 'Sekupang',
                            'belakang padang' => 'Belakang Padang',
                        ])
                        ->required(),
                    FileUpload::make('img_program')
                        ->image()
                        ->preserveFilenames()
                        ->directory('ImageProgram')
                        ->required(),
                    ComponentsRichEditor::make('deskripsi')
                        ->fileAttachmentsDirectory('ImageProgramDeskripsi')
                        ->required(),
                    TextInput::make('target_donasi')
                        ->numeric()
                        ->inputMode('decimal')
                        ->required(),
                    // Textarea::make('donasi_terkumpul'),
                    Toggle::make('isDone')
                        ->onColor('success')
                        ->offColor('danger'),

                    Select::make('status')
                        ->options([
                            'draft' => 'Draft',
                            'published' => 'Published',
                        ])
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
                    ->limit(30)
                    ->sortable(),
                TextColumn::make('kategori.nama')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),
                SelectColumn::make('kecamatan')
                    ->searchable()
                    ->options([
                        'batu aji' => 'Batu Aji',
                        'batam kota' => 'Batam Kota',
                        'bengkong' => 'Bengkong',
                        'batu ampar' => 'Batu Ampar',
                        'nongsa' => 'Nongsa',
                        'bulang' => 'Bulang',
                        'galang' => 'Galang',
                        'lubuk baja' => 'Lubuk Baja',
                        'sei beduk' => 'Sei Beduk',
                        'sekupang' => 'Sekupang',
                        'belakang padang' => 'Belakang Padang',
                    ])
                    ->sortable(),
                ImageColumn::make('img_program')
                    ->label('Gambar Program')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('deskripsi')
                    ->limit(20)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('target_donasi')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn($state) => number_format($state, 0, ',', '.')),
                TextColumn::make('donasi_terkumpul')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn($state) => number_format($state ?? 0, 0, ',', '.')),
                ToggleColumn::make('isDone')
                    ->label('Selesai')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('created_by')
                    ->searchable()
                    ->sortable(),
                SelectColumn::make('status')
                    ->searchable()
                    ->options([
                        'draft' => 'Draft',
                        'reviewing' => 'Reviewing',
                        'published' => 'Published',
                    ])
                    ->sortable(),
                TextColumn::make('created_at')
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

    protected static function booted()
    {
        static::updated(function ($program) {
            // Log perubahan nilai `isDone`
            if ($program->isDirty('isDone')) {
                logger("State diperbarui untuk Program ID {$program->id}: {$program->isDone}");
            }
        });
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug($data['nama']); // Generate slug dari judul
        // Cari user dengan username 'admin'
        $admin = User::where('username', 'admin')->first();

        if (!$admin) {
            throw new \Exception("User dengan username 'admin' tidak ditemukan.");
        }

        $data['created_by'] = $admin->username; // Isi created_by dengan ID admin
        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        if (!isset($data['slug']) || empty($data['slug'])) {
            $data['slug'] = Str::slug($data['nama']); // 
        }
        // Pastikan created_by hanya diubah jika diperlukan
        if (!isset($data['created_by'])) {
            $admin = User::where('username', 'admin')->first();
            if ($admin) {
                $data['created_by'] = $admin->username;
            }
        }

        return $data;
    }
}
