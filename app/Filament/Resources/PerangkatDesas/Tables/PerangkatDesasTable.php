<?php

namespace App\Filament\Resources\PerangkatDesas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PerangkatDesasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(
                        url('/images/default-avatar.png')
                    ),

                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nip_nik')
                    ->label('NRPD')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('nomor_sk')
                    ->label('Nomor SK')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('tanggal_sk')
                    ->label('Tanggal SK')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('file_sk')
                    ->label('File SK')
                    ->formatStateUsing(
                        fn(?string $state): string =>
                        $state ? 'Lihat SK' : '-'
                    )
                    ->url(
                        fn($record) =>
                        $record->file_sk
                            ? route(
                                'perangkat-desa.sk.preview',
                                $record
                            )
                            : null
                    )
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-document-text')
                    ->color('primary'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(
                        fn(string $state): string => match ($state) {
                            'aktif' => 'success',
                            'tidak_aktif' => 'danger',
                            default => 'gray',
                        }
                    ),

                TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])

            ->filters([

                \Filament\Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'tidak_aktif' => 'Tidak Aktif',
                    ]),

            ])

            ->recordActions([
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->defaultSort(
                'nama',
                'asc'
            )

            ->striped();
    }
}
