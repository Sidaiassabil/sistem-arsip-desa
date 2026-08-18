<?php

namespace App\Filament\Resources\KegiatanPembangunans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class KegiatanPembangunanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // INFORMASI KEGIATAN
                Section::make('Informasi Kegiatan')
                    ->schema([
                        TextInput::make('nama_kegiatan')
                            ->label('Nama Kegiatan')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('lokasi')
                            ->label('Lokasi')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('tahun')
                            ->label('Tahun')
                            ->numeric()
                            ->minValue(2000)
                            ->maxValue(2100)
                            ->required(),

                        TextInput::make('volume')
                            ->label('Volume')
                            ->placeholder('Contoh: 100 meter'),

                        TextInput::make('pelaksana')
                            ->label('Pelaksana')
                            ->maxLength(255),

                        Select::make('status')
                            ->label('Status Kegiatan')
                            ->options([
                                'Perencanaan' => 'Perencanaan',
                                'Berjalan' => 'Berjalan',
                                'Selesai' => 'Selesai',
                            ])
                            ->default('Perencanaan')
                            ->required(),
                    ])
                    ->columns(2),

                // ANGGARAN
                Section::make('Anggaran dan Sumber Dana')
                    ->schema([
                        TextInput::make('anggaran')
                            ->label('Anggaran')
                            ->numeric()
                            ->prefix('Rp')
                            ->placeholder('Contoh: 150000000'),

                        TextInput::make('sumber_dana')
                            ->label('Sumber Dana')
                            ->placeholder('Contoh: Dana Desa')
                            ->maxLength(255),
                    ])
                    ->columns(2),

                // KETERANGAN & DOKUMENTASI
                Section::make('Keterangan dan Dokumentasi')
                    ->schema([
                        Textarea::make('deskripsi')
                            ->label('Deskripsi / Keterangan')
                            ->rows(5)
                            ->columnSpanFull(),

                        FileUpload::make('foto')
                            ->label('Foto Kegiatan')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('kegiatan-pembangunan')
                            ->maxSize(5120)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                // WAKTU PELAKSANAAN
                Section::make('Waktu Pelaksanaan')
                    ->schema([
                        DatePicker::make('tanggal_mulai')
                            ->label('Tanggal Mulai')
                            ->native(false)
                            ->displayFormat('d/m/Y'),

                        DatePicker::make('tanggal_selesai')
                            ->label('Tanggal Selesai')
                            ->native(false)
                            ->displayFormat('d/m/Y'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}