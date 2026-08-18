<?php

namespace App\Filament\Resources\SuratKeluars\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SuratKeluarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nomor_agenda')
                    ->label('Nomor Agenda')
                    ->required()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true)
                    ->placeholder('Contoh: SK-001/2026'),

                TextInput::make('nomor_surat')
                    ->label('Nomor Surat')
                    ->required()
                    ->maxLength(100)
                    ->unique(ignoreRecord: true)
                    ->placeholder('Contoh: 140/001/DS/2026'),

                DatePicker::make('tanggal_surat')
                    ->label('Tanggal Surat')
                    ->required()
                    ->native(false)
                    ->displayFormat('d M Y'),

                TextInput::make('tujuan_surat')
                    ->label('Tujuan Surat')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Contoh: Kecamatan Gunungsari'),

                TextInput::make('perihal')
                    ->label('Perihal')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan perihal surat'),

                TextInput::make('penandatangan')
                    ->label('Penandatangan')
                    ->required()
                    ->maxLength(150)
                    ->placeholder('Contoh: Kepala Desa Luwuk'),

                Select::make('status')
                    ->label('Status Surat')
                    ->options([
                        'draft' => 'Draft',
                        'ditandatangani' => 'Ditandatangani',
                        'dikirim' => 'Dikirim',
                        'selesai' => 'Selesai',
                    ])
                    ->default('draft')
                    ->required(),

                FileUpload::make('file')
                    ->label('File Surat')
                    ->required()
                    ->disk('public')
                    ->directory('surat-keluar')
                    ->acceptedFileTypes([
                        'application/pdf',
                    ])
                    ->maxSize(10240)
                    ->downloadable()
                    ->openable()
                    ->preserveFilenames(false),

                Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->rows(4)
                    ->maxLength(1000)
                    ->placeholder('Keterangan tambahan jika diperlukan'),

            ]);
    }
}