<?php

namespace App\Filament\Resources\PerangkatDesas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PerangkatDesaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Data Perangkat Desa')
                    ->description('Informasi dasar perangkat desa.')
                    ->schema([

                        FileUpload::make('foto')
                            ->label('Foto')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('perangkat-desa/foto')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->nullable()
                            ->columnSpanFull(),

                        TextInput::make('nama')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('jabatan')
                            ->label('Jabatan')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('nip_nik')
                            ->label('NRPD')
                            ->maxLength(100)
                            ->nullable(),

                    ])
                    ->columns(2),

                Section::make('Data Surat Keputusan')
                    ->description('Informasi SK pengangkatan perangkat desa.')
                    ->schema([

                        TextInput::make('nomor_sk')
                            ->label('Nomor SK')
                            ->maxLength(255)
                            ->nullable(),

                        DatePicker::make('tanggal_sk')
                            ->label('Tanggal SK')
                            ->native(false)
                            ->displayFormat('d M Y')
                            ->nullable(),

                        FileUpload::make('file_sk')
                            ->label('File SK')
                            ->disk('public')
                            ->directory('perangkat-desa/sk')
                            ->visibility('public')
                            ->acceptedFileTypes([
                                'application/pdf',
                            ])
                            ->maxSize(10240)
                            ->downloadable()
                            ->openable()
                            ->nullable()
                            ->columnSpanFull(),

                    ])
                    ->columns(2),

                Section::make('Status & Keterangan')
                    ->schema([

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'aktif' => 'Aktif',
                                'tidak_aktif' => 'Tidak Aktif',
                            ])
                            ->default('aktif')
                            ->required()
                            ->native(false),

                        Textarea::make('keterangan')
                            ->label('Keterangan')
                            ->rows(4)
                            ->maxLength(1000)
                            ->nullable()
                            ->columnSpanFull(),

                    ])
                    ->columns(2),

            ]);
    }
}
