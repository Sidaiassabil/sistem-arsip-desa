<?php

namespace App\Filament\Resources\Arsips\Schemas;

use App\Models\Arsip;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ArsipForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_arsip')
                    ->label('Kode Arsip')
                    ->placeholder('Otomatis saat arsip disimpan')
                    ->disabled()
                    ->dehydrated(false),

                TextInput::make('nomor_dokumen')
                    ->label('Nomor Dokumen')
                    ->maxLength(255),

                TextInput::make('judul')
                    ->label('Judul Dokumen')
                    ->required()
                    ->maxLength(255),

                Select::make('kategori_arsip_id')
                    ->label('Kategori Arsip')
                    ->relationship('kategoriArsip', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('tahun')
                    ->label('Tahun')
                    ->options(
                        collect(range(now()->year - 10, now()->year + 1))
                            ->mapWithKeys(fn($year) => [
                                $year => $year,
                            ])
                            ->toArray()
                    )
                    ->default(now()->year)
                    ->live()
                    ->required()
                    ->searchable(),

                DatePicker::make('tanggal_dokumen')
                    ->label('Tanggal Dokumen')
                    ->default(now())
                    ->native(false)
                    ->required(),

                TextInput::make('sumber')
                    ->label('Sumber Dokumen')
                    ->placeholder('Contoh: Kantor Desa Luwuk')
                    ->maxLength(255),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->columnSpanFull(),

                FileUpload::make('file')
                    ->label('File Dokumen')
                    ->disk('public')
                    ->directory('arsip')
                    ->visibility('public')
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'image/jpeg',
                        'image/png',
                    ])
                    ->maxSize(10240)
                    ->downloadable()
                    ->openable()
                    ->required(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Nonaktif',
                    ])
                    ->default('aktif')
                    ->required(),
            ]);
    }
}
