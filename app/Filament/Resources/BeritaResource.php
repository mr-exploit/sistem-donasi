<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Filament\Resources\BeritaResource\RelationManagers;
use App\Models\Berita;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BeritaExport;
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
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Support\Str;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    TextInput::make('judul')
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                    TextInput::make('slug')
                        ->disabled()
                        ->required(),
                    FileUpload::make('img_berita')
                        ->image()
                        ->preserveFilenames()
                        ->directory('imageBerita')
                        ->required(),
                    Textarea::make('list_berita')
                        ->required(),
                    ComponentsRichEditor::make('content')
                        ->fileAttachmentsDirectory('ImageBeritaContent')
                        ->required(),
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
                TextColumn::make('judul')
                    ->searchable()
                    ->limit(30)
                    ->sortable(),
                ImageColumn::make('img_berita')
                    ->label('Gambar Berita')
                    ->searchable()
                    ->width(100)
                    ->height(50)
                    ->size(10)
                    ->sortable(),
                TextColumn::make('list_berita')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('content')
                    ->limit(20)
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
                TextColumn::make('created_by')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                // Tables\Actions\Action::make('export')
                //     ->label('Export Transactions')
                //     ->action(function () {
                //         return Excel::download(new BeritaExport, 'berita.xlsx');
                //     }),
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug($data['judul']); // Generate slug dari judul
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
            $data['slug'] = Str::slug($data['judul']); // Generate slug jika kosong
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
