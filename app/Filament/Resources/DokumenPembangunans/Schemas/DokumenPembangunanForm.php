<?php

namespace App\Filament\Resources\DokumenPembangunans\Schemas;

use App\Models\KegiatanPembangunan;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DokumenPembangunanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Dokumen')
                    ->schema([
                        Select::make('kegiatan_pembangunan_id')
                            ->label('Kegiatan Pembangunan')
                            ->relationship(
                                'kegiatanPembangunan',
                                'nama_kegiatan'
                            )
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('nama_dokumen')
                            ->label('Nama Dokumen')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('tahun')
                            ->label('Tahun')
                            ->numeric()
                            ->minValue(2000)
                            ->maxValue(2100)
                            ->required(),

                        Select::make('jenis_dokumen')
                            ->label('Jenis Dokumen')
                            ->options([
                                'RAB' => 'RAB',
                                'Proposal' => 'Proposal',
                                'SPK' => 'SPK',
                                'Kontrak' => 'Kontrak',
                                'Laporan' => 'Laporan',
                                'Berita Acara' => 'Berita Acara',
                                'LPJ' => 'LPJ',
                                'Dokumen Lainnya' => 'Dokumen Lainnya',
                            ])
                            ->searchable()
                            ->required(),

                        TextInput::make('nomor_dokumen')
                            ->label('Nomor Dokumen')
                            ->maxLength(255),

                        DatePicker::make('tanggal_dokumen')
                            ->label('Tanggal Dokumen')
                            ->native(false)
                            ->displayFormat('d/m/Y'),
                    ])
                    ->columns(2),

                Section::make('Keterangan dan File')
                    ->schema([
                        Textarea::make('keterangan')
                            ->label('Keterangan')
                            ->rows(5)
                            ->columnSpanFull(),

                        FileUpload::make('file')
                            ->label('File Dokumen')
                            ->disk('public')
                            ->directory('dokumen-pembangunan')
                            ->acceptedFileTypes([
                                'application/pdf',
                                'application/msword',
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                'application/vnd.ms-excel',
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            ])
                            ->maxSize(10240)
                            ->downloadable()
                            ->openable()
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}