<?php

namespace App\Filament\Resources\SuratMasuks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SuratMasukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                /*
                |--------------------------------------------------------------------------
                | Informasi Surat
                |--------------------------------------------------------------------------
                */

                Section::make('Informasi Surat')
                    ->description(
                        'Informasi utama surat yang diterima oleh Kantor Desa Luwuk.'
                    )
                    ->schema([

                        TextInput::make('nomor_agenda')
                            ->label('Nomor Agenda')
                            ->placeholder('Contoh: 001/SM/2026')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('nomor_surat')
                            ->label('Nomor Surat')
                            ->placeholder('Masukkan nomor surat')
                            ->required()
                            ->maxLength(255),

                        DatePicker::make('tanggal_surat')
                            ->label('Tanggal Surat')
                            ->native(false)
                            ->displayFormat('d M Y')
                            ->required(),

                        DatePicker::make('tanggal_diterima')
                            ->label('Tanggal Diterima')
                            ->default(now())
                            ->native(false)
                            ->displayFormat('d M Y')
                            ->required(),

                    ])
                    ->columns(2),


                /*
                |--------------------------------------------------------------------------
                | Detail Surat
                |--------------------------------------------------------------------------
                */

                Section::make('Detail Surat')
                    ->description(
                        'Informasi mengenai pengirim dan tujuan surat.'
                    )
                    ->schema([

                        TextInput::make('asal_surat')
                            ->label('Asal Surat')
                            ->placeholder(
                                'Contoh: Kecamatan Gunungsari'
                            )
                            ->required()
                            ->maxLength(255),

                        TextInput::make('perihal')
                            ->label('Perihal')
                            ->placeholder(
                                'Masukkan perihal surat'
                            )
                            ->required()
                            ->maxLength(255),

                        TextInput::make('ditujukan_kepada')
                            ->label('Ditujukan Kepada')
                            ->placeholder(
                                'Contoh: Kepala Desa Luwuk'
                            )
                            ->maxLength(255)
                            ->columnSpanFull(),

                    ])
                    ->columns(2),


                /*
                |--------------------------------------------------------------------------
                | Disposisi
                |--------------------------------------------------------------------------
                */

                Section::make('Disposisi & Status')
                    ->description(
                        'Catatan tindak lanjut dan status surat.'
                    )
                    ->schema([

                        Textarea::make('disposisi')
                            ->label('Disposisi')
                            ->placeholder(
                                'Contoh: Disposisi kepada Sekretaris Desa untuk ditindaklanjuti.'
                            )
                            ->rows(4)
                            ->columnSpanFull(),

                        Select::make('status')
                            ->label('Status Surat')
                            ->options([
                                'diterima' => 'Diterima',
                                'diproses' => 'Diproses',
                                'didisposisi' => 'Didisposisi',
                                'selesai' => 'Selesai',
                            ])
                            ->default('diterima')
                            ->required(),

                        Textarea::make('keterangan')
                            ->label('Keterangan')
                            ->placeholder(
                                'Catatan tambahan jika diperlukan.'
                            )
                            ->rows(3)
                            ->columnSpanFull(),

                    ])
                    ->columns(2),


                /*
                |--------------------------------------------------------------------------
                | File Surat
                |--------------------------------------------------------------------------
                */

                Section::make('Dokumen Surat')
                    ->description(
                        'Upload dokumen surat yang diterima.'
                    )
                    ->schema([

                        FileUpload::make('file')
                            ->label('File Surat')
                            ->disk('public')
                            ->directory('surat-masuk')
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
                            ->required()
                            ->columnSpanFull(),

                    ]),
            ]);
    }
}