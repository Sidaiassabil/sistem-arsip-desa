<?php

namespace App\Filament\Resources\DokumenKeuangans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DokumenKeuanganForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Dokumen')
                    ->schema([
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

                        TextInput::make('nomor_dokumen')
                            ->label('Nomor Dokumen')
                            ->maxLength(255),

                        DatePicker::make('tanggal_dokumen')
                            ->label('Tanggal Dokumen')
                            ->native(false)
                            ->displayFormat('d/m/Y'),

                        Select::make('jenis_dokumen')
                            ->label('Jenis Dokumen')
                            ->options([
                                'APBDes' => 'APBDes',
                                'RAB' => 'RAB',
                                'SPJ' => 'SPJ',
                                'LPJ' => 'LPJ',
                                'Laporan Keuangan' => 'Laporan Keuangan',
                                'Bukti Pengeluaran' => 'Bukti Pengeluaran',
                                'Kwitansi' => 'Kwitansi',
                                'Berita Acara' => 'Berita Acara',
                                'Dokumen Lainnya' => 'Dokumen Lainnya',
                            ])
                            ->searchable()
                            ->required(),

                        TextInput::make('sumber_dana')
                            ->label('Sumber Dana')
                            ->placeholder('Contoh: Dana Desa')
                            ->maxLength(255),
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
                            ->directory('dokumen-keuangan')
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