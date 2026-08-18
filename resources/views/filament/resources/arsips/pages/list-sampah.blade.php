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
            min-width: 900px;
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

        .kode-arsip {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 6px;
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .judul-dokumen {
            color: #111827;
            font-weight: 600;
        }

        .nomor-dokumen {
            margin-top: 4px;
            color: #94a3b8;
            font-size: 12px;
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
                min-width: 850px;
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
                        Sampah Arsip
                    </h2>

                    <p>
                        Arsip yang dihapus sementara masih dapat dipulihkan.
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
                            Kode Arsip
                        </th>

                        <th>
                            Judul Dokumen
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Tahun
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
                        $arsipSampah = \App\Models\Arsip::onlyTrashed()
                            ->with('kategoriArsip')
                            ->latest('deleted_at')
                            ->get();
                    @endphp


                    @forelse ($arsipSampah as $arsip)

                        <tr>

                            {{-- Kode --}}
                            <td>

                                <span class="kode-arsip">
                                    {{ $arsip->kode_arsip }}
                                </span>

                            </td>


                            {{-- Judul --}}
                            <td>

                                <div class="judul-dokumen">
                                    {{ $arsip->judul }}
                                </div>

                                @if ($arsip->nomor_dokumen)

                                    <div class="nomor-dokumen">
                                        No. {{ $arsip->nomor_dokumen }}
                                    </div>

                                @endif

                            </td>


                            {{-- Kategori --}}
                            <td>

                                {{ $arsip->kategoriArsip?->nama ?? '-' }}

                            </td>


                            {{-- Tahun --}}
                            <td>

                                {{ $arsip->tahun }}

                            </td>


                            {{-- Dihapus --}}
                            <td>

                                <div class="tanggal-hapus">

                                    {{ $arsip->deleted_at?->format('d M Y') }}

                                </div>

                                <div class="jam-hapus">

                                    {{ $arsip->deleted_at?->format('H:i') }}

                                </div>

                            </td>


                            {{-- Aksi --}}
                            <td>

                                <div class="aksi">

                                    <x-filament::button
                                        color="success"
                                        size="sm"
                                        wire:click="restoreArsip({{ $arsip->id }})"
                                    >
                                        Pulihkan
                                    </x-filament::button>


                                    <x-filament::button
                                        color="danger"
                                        size="sm"
                                        wire:click="deletePermanently({{ $arsip->id }})"
                                        wire:confirm="Apakah Anda yakin ingin menghapus arsip ini secara permanen? Data dan file dokumen tidak dapat dipulihkan."
                                    >
                                        Hapus Permanen
                                    </x-filament::button>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        🗑
                                    </div>

                                    <div class="empty-title">
                                        Sampah kosong
                                    </div>

                                    <div class="empty-description">
                                        Tidak ada arsip yang dihapus.
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