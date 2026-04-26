<?php

namespace App\Filament\Resources\DataKesehatans;

// use App\Filament\Resources\DataKesehatans\Pages\CreateDataKesehatan;
// use App\Filament\Resources\DataKesehatans\Pages\EditDataKesehatan;
use App\Filament\Resources\DataKesehatans\Pages\ListDataKesehatans;
use App\Filament\Resources\DataKesehatans\Pages\ViewDataKesehatan;
use App\Filament\Resources\DataKesehatans\Schemas\DataKesehatanForm;
use App\Filament\Resources\DataKesehatans\Schemas\DataKesehatanInfolist;
use App\Filament\Resources\DataKesehatans\Tables\DataKesehatansTable;
use App\Models\DataKesehatan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
// use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DataKesehatanResource extends Resource
{
    protected static ?string $model = DataKesehatan::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-heart';

    protected static ?string $pluralModelLabel = 'Data Kesehatan';
    protected static ?string $slug = 'data-kesehatan';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return DataKesehatanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DataKesehatanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataKesehatansTable::configure($table);
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
            'index' => ListDataKesehatans::route('/'),
            // 'create' => CreateDataKesehatan::route('/create'),
            'view' => ViewDataKesehatan::route('/{record}'),
            // 'edit' => EditDataKesehatan::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereIn('id', function ($query) {
                $query->selectRaw('max(id)')
                    ->from('data_kesehatan') // pastikan nama tabelnya benar (cek di migration)
                    ->groupBy('pengguna_id');
            })
            ->latest(); // urutkan yang paling baru di paling atas
    }
}