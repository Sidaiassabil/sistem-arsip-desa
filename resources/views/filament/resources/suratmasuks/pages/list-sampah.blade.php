<x-filament-panels::page>

    <style>
        .trash-page {
            width: 100%;
        }

        .trash-info {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .trash-info-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 6px;
        }

        .trash-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 20px;
        }

        .trash-info h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            color: #111827;
        }

        .trash-info p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }

        .trash-table-wrapper {
            width: 100%;
            overflow-x: auto;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
        }

        .trash-table {
            width: 100%;
            min-width: 1100px;
            border-collapse: collapse;
        }

        .trash-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 13px;
            font-weight: 700;
            text-align: left;
            padding: 14px 16px;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        .trash-table td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
            font-size: 14px;
            vertical-align: middle;
        }

        .trash-table tbody tr:last-child td {
            border-bottom: none;
        }

        .trash-table tbody tr:hover {
            background: #f8fafc;
        }

        .nomor-agenda {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 6px;
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .nomor-surat {
            color: #111827;
            font-weight: 600;
            white-space: nowrap;
        }

        .asal-surat {
            color: #334155;
            font-weight: 500;
        }

        .perihal-surat {
            color: #111827;
            font-weight: 600;
            max-width: 250px;
        }

        .tanggal-surat {
            color: #334155;
            white-space: nowrap;
        }

        .tanggal-hapus {
            color: #334155;
            white-space: nowrap;
        }

        .jam-hapus {
            margin-top: 3px;
            color: #94a3b8;
            font-size: 12px;
        }

        .aksi {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            white-space: nowrap;
        }

        .empty-state {
            padding: 60px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 56px;
            height: 56px;
            margin: 0 auto 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f1f5f9;
            color: #94a3b8;
            font-size: 24px;
        }

        .empty-title {
            color: #111827;
            font-size: 16px;
            font-weight: 700;
        }

        .empty-description {
            margin-top: 5px;
            color: #94a3b8;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .trash-info {
                padding: 16px;
            }

            .trash-table {
                min-width: 1000px;
            }
        }
    </style>


    <div class="trash-page">

        {{-- Informasi Sampah --}}
        <div class="trash-info">

            <div class="trash-info-title">

                <div class="trash-icon">
                    🗑
                </div>

                <div>

                    <h2>
                        Sampah Surat Masuk
                    </h2>

                    <p>
                        Surat masuk yang dihapus sementara dan masih dapat dipulihkan.
                    </p>

                </div>

            </div>

        </div>


        {{-- Tabel --}}
        <div class="trash-table-wrapper">

            <table class="trash-table">

                <thead>

                    <tr>

                        <th>
                            No. Agenda
                        </th>

                        <th>
                            Nomor Surat
                        </th>

                        <th>
                            Asal Surat
                        </th>

                        <th>
                            Perihal
                        </th>

                        <th>
                            Tanggal Surat
                        </th>

                        <th>
                            Diterima
                        </th>

                        <th>
                            Dihapus
                        </th>

                        <th style="text-align: right;">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @php
                        $suratMasukSampah = \App\Models\SuratMasuk::onlyTrashed()
                            ->latest('deleted_at')
                            ->get();
                    @endphp


                    @forelse ($suratMasukSampah as $surat)

                        <tr>

                            {{-- No. Agenda --}}
                            <td>

                                <span class="nomor-agenda">
                                    {{ $surat->nomor_agenda }}
                                </span>

                            </td>


                            {{-- Nomor Surat --}}
                            <td>

                                <div class="nomor-surat">
                                    {{ $surat->nomor_surat }}
                                </div>

                            </td>


                            {{-- Asal Surat --}}
                            <td>

                                <div class="asal-surat">
                                    {{ $surat->asal_surat }}
                                </div>

                            </td>


                            {{-- Perihal --}}
                            <td>

                                <div class="perihal-surat">
                                    {{ $surat->perihal }}
                                </div>

                            </td>


                            {{-- Tanggal Surat --}}
                            <td>

                                <div class="tanggal-surat">
                                    {{ $surat->tanggal_surat?->format('d M Y') ?? '-' }}
                                </div>

                            </td>


                            {{-- Tanggal Diterima --}}
                            <td>

                                <div class="tanggal-surat">
                                    {{ $surat->tanggal_diterima?->format('d M Y') ?? '-' }}
                                </div>

                            </td>


                            {{-- Dihapus --}}
                            <td>

                                <div class="tanggal-hapus">

                                    {{ $surat->deleted_at?->format('d M Y') }}

                                </div>

                                <div class="jam-hapus">

                                    {{ $surat->deleted_at?->format('H:i') }}

                                </div>

                            </td>


                            {{-- Aksi --}}
                            <td>

                                <div class="aksi">

                                    {{-- Pulihkan --}}
                                    <x-filament::button
                                        color="success"
                                        size="sm"
                                        wire:click="restoreSuratMasuk({{ $surat->id }})"
                                    >
                                        Pulihkan
                                    </x-filament::button>


                                    {{-- Hapus Permanen --}}
                                    <x-filament::button
                                        color="danger"
                                        size="sm"
                                        wire:click="deletePermanently({{ $surat->id }})"
                                        wire:confirm="Apakah Anda yakin ingin menghapus surat masuk ini secara permanen? Data dan file dokumen tidak dapat dipulihkan."
                                    >
                                        Hapus Permanen
                                    </x-filament::button>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        🗑
                                    </div>

                                    <div class="empty-title">
                                        Sampah kosong
                                    </div>

                                    <div class="empty-description">
                                        Tidak ada surat masuk yang dihapus.
                                    </div>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-filament-panels::page>