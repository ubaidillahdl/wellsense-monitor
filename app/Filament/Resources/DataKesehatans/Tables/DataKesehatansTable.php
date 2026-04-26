<?php

namespace App\Filament\Resources\DataKesehatans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
// use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DataKesehatansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pengguna.nama')
                    ->label('Pengguna')
                    ->width('17ch')
                    ->limit(17)
                    ->sortable()
                    ->searchable(),
                TextColumn::make('hr')
                    ->label('HR (bpm)')
                    ->width('15ch')
                    ->limit(15)
                    ->numeric(
                        decimalPlaces: 2,
                    )
                    ->visibleFrom('md'),
                TextColumn::make('spo2')
                    ->label('SPO2 (%)')
                    ->width('10ch')
                    ->limit(10)
                    ->numeric(
                        decimalPlaces: 2,
                    )
                    ->visibleFrom('xl'),
                TextColumn::make('sbp')
                    ->label('SBP (mmHg)')
                    ->width('10ch')
                    ->limit(10)
                    ->numeric(
                        decimalPlaces: 4,
                    )
                    ->visibleFrom('md'),
                TextColumn::make('dbp')
                    ->label('DBP (mmHg)')
                    ->width('10ch')
                    ->limit(10)
                    ->numeric(
                        decimalPlaces: 4,
                    )
                    ->visibleFrom('md'),
                TextColumn::make('hb')
                    ->label('HB (g/L)')
                    ->width('10ch')
                    ->limit(10)
                    ->numeric(
                        decimalPlaces: 4,
                    )
                    ->visibleFrom('xl'),
                TextColumn::make('created_at')
                    ->label('Diperbarui Pada')
                    ->dateTime()
                    ->timezone('Asia/Jakarta')
                    ->visibleFrom('2xl'),
                TextColumn::make('spacer')
                    ->label('')
                    ->grow(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()->iconButton(),
                // EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}