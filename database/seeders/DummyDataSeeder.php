<?php

namespace Database\Seeders;

use App\Models\Arsip;
use App\Models\KategoriArsip;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\PerangkatDesa;
use App\Models\KegiatanPembangunan;
use App\Models\DokumenPembangunan;
use App\Models\DokumenKeuangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    /*
    |--------------------------------------------------------------------------
    | Helper: Dummy PDF
    |--------------------------------------------------------------------------
    */

    private function createDummyPdf(
        string $directory,
        string $filename,
        string $title = 'Dokumen Dummy Desa Luwuk'
    ): string {
        $path = $directory . '/' . $filename;

        $content = "BT\n"
            . "/F1 18 Tf\n"
            . "100 700 Td\n"
            . "(" . $title . ") Tj\n"
            . "ET\n";

        $objects = [];

        $objects[] = "1 0 obj\n"
            . "<< /Type /Catalog /Pages 2 0 R >>\n"
            . "endobj\n";

        $objects[] = "2 0 obj\n"
            . "<< /Type /Pages /Kids [3 0 R] /Count 1 >>\n"
            . "endobj\n";

        $objects[] = "3 0 obj\n"
            . "<< /Type /Page /Parent 2 0 R "
            . "/MediaBox [0 0 612 792] "
            . "/Resources << /Font << /F1 5 0 R >> >> "
            . "/Contents 4 0 R >>\n"
            . "endobj\n";

        $objects[] = "4 0 obj\n"
            . "<< /Length " . strlen($content) . " >>\n"
            . "stream\n"
            . $content
            . "endstream\n"
            . "endobj\n";

        $objects[] = "5 0 obj\n"
            . "<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>\n"
            . "endobj\n";

        $pdf = "%PDF-1.4\n";
        $offsets = [0];

        foreach ($objects as $object) {
            $offsets[] = strlen($pdf);
            $pdf .= $object;
        }

        $xrefPosition = strlen($pdf);

        $pdf .= "xref\n";
        $pdf .= "0 " . count($objects) + 1 . "\n";
        $pdf .= "0000000000 65535 f \n";

        for ($i = 1; $i < count($offsets); $i++) {
            $pdf .= sprintf(
                "%010d 00000 n \n",
                $offsets[$i]
            );
        }

        $pdf .= "trailer\n";
        $pdf .= "<< /Size " . (count($objects) + 1) . " /Root 1 0 R >>\n";
        $pdf .= "startxref\n";
        $pdf .= $xrefPosition . "\n";
        $pdf .= "%%EOF";

        Storage::disk('public')->put($path, $pdf);

        return $path;
    }

    /*
    |--------------------------------------------------------------------------
    | Helper: Dummy Image
    |--------------------------------------------------------------------------
    */

    private function createDummyImage(
        string $directory,
        string $filename,
        string $title = 'Dokumentasi Dummy'
    ): string {
        $path = $directory . '/' . $filename;

        $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="800" height="500">
    <rect width="800" height="500" fill="#e5e7eb"/>
    <rect x="40" y="40" width="720" height="420"
          rx="20" fill="#ffffff"
          stroke="#9ca3af" stroke-width="3"/>

    <text x="400" y="220"
          text-anchor="middle"
          font-family="Arial"
          font-size="34"
          font-weight="bold"
          fill="#374151">
        {$title}
    </text>

    <text x="400" y="275"
          text-anchor="middle"
          font-family="Arial"
          font-size="26"
          fill="#6b7280">
        Desa Luwuk
    </text>

    <text x="400" y="325"
          text-anchor="middle"
          font-family="Arial"
          font-size="20"
          fill="#9ca3af">
        Data Dummy Sistem Arsip
    </text>
</svg>
SVG;

        Storage::disk('public')->put($path, $svg);

        return $path;
    }

    /*
    |--------------------------------------------------------------------------
    | Seeder
    |--------------------------------------------------------------------------
    */

    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | USER
        |--------------------------------------------------------------------------
        */

        $user = User::first();

        if (!$user) {
            $this->command->error(
                'User belum tersedia. Silakan buat user Admin terlebih dahulu.'
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | KATEGORI ARSIP
        |--------------------------------------------------------------------------
        */

        $kategoriData = [
            [
                'nama' => 'Administrasi Desa',
                'deskripsi' => 'Dokumen administrasi umum Desa Luwuk.',
            ],
            [
                'nama' => 'Kependudukan',
                'deskripsi' => 'Dokumen administrasi kependudukan.',
            ],
            [
                'nama' => 'Kepegawaian',
                'deskripsi' => 'Dokumen kepegawaian dan perangkat desa.',
            ],
            [
                'nama' => 'Surat Menyurat',
                'deskripsi' => 'Dokumen surat masuk dan surat keluar.',
            ],
            [
                'nama' => 'Pembangunan',
                'deskripsi' => 'Dokumen kegiatan pembangunan desa.',
            ],
            [
                'nama' => 'Keuangan Desa',
                'deskripsi' => 'Dokumen administrasi keuangan desa.',
            ],
            [
                'nama' => 'Peraturan Desa',
                'deskripsi' => 'Peraturan dan keputusan desa.',
            ],
            [
                'nama' => 'Laporan Desa',
                'deskripsi' => 'Dokumen laporan kegiatan desa.',
            ],
        ];

        $kategori = collect();

        foreach ($kategoriData as $item) {
            $kategori->push(
                KategoriArsip::firstOrCreate(
                    [
                        'slug' => Str::slug($item['nama']),
                    ],
                    [
                        'nama' => $item['nama'],
                        'deskripsi' => $item['deskripsi'],
                    ]
                )
            );
        }

        /*
        |--------------------------------------------------------------------------
        | ARSIP
        |--------------------------------------------------------------------------
        */

        $arsipData = [
            'Peraturan Desa tentang APBDes',
            'Peraturan Desa tentang Pembangunan',
            'Keputusan Kepala Desa',
            'Laporan Penyelenggaraan Pemerintahan Desa',
            'Laporan Pertanggungjawaban Desa',
            'Dokumen Musyawarah Desa',
            'Berita Acara Musyawarah Desa',
            'Data Administrasi Kependudukan',
            'Dokumen Inventaris Desa',
            'Dokumen Administrasi Pemerintahan',
            'Dokumen Kegiatan Desa',
            'Laporan Kegiatan Pemerintah Desa',
            'Dokumen Perencanaan Desa',
            'Dokumen Rencana Kerja Pemerintah Desa',
            'Dokumen RPJM Desa',
            'Dokumen APBDes',
            'Dokumen Perubahan APBDes',
            'Laporan Realisasi APBDes',
            'Dokumen Pertanggungjawaban Keuangan',
            'Dokumen Evaluasi Kegiatan Desa',
        ];

        foreach ($arsipData as $index => $judul) {
            $kodeArsip =
                'ARS-' .
                str_pad($index + 1, 4, '0', STR_PAD_LEFT);

            $tanggal = Carbon::create(
                2026,
                ($index % 8) + 1,
                ($index % 20) + 1
            );

            $file = $this->createDummyPdf(
                'arsip',
                strtolower($kodeArsip) . '.pdf',
                $judul
            );

            Arsip::firstOrCreate(
                [
                    'kode_arsip' => $kodeArsip,
                ],
                [
                    'nomor_dokumen' =>
                        '140/' .
                        str_pad($index + 1, 3, '0', STR_PAD_LEFT) .
                        '/DS-LWK/2026',

                    'judul' => $judul,

                    'kategori_arsip_id' =>
                        $kategori->get(
                            $index % $kategori->count()
                        )->id,

                    'tahun' => 2026,

                    'tanggal_dokumen' => $tanggal,

                    'sumber' => 'Pemerintah Desa Luwuk',

                    'deskripsi' =>
                        'Dokumen dummy untuk pengujian Sistem Pengarsipan Desa Luwuk.',

                    'file' => $file,

                    'status' => 'aktif',

                    'user_id' => $user->id,
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SURAT MASUK
        |--------------------------------------------------------------------------
        */

        $suratMasuk = [
            ['asal' => 'Kecamatan Gunungsari', 'perihal' => 'Undangan Rapat Koordinasi Pemerintahan Desa'],
            ['asal' => 'Dinas Pemberdayaan Masyarakat Desa', 'perihal' => 'Pemberitahuan Kegiatan Pembinaan Desa'],
            ['asal' => 'Puskesmas Gunungsari', 'perihal' => 'Jadwal Pelayanan Kesehatan Masyarakat'],
            ['asal' => 'Kecamatan Gunungsari', 'perihal' => 'Undangan Musyawarah Perencanaan Pembangunan'],
            ['asal' => 'Dinas Sosial Kabupaten', 'perihal' => 'Program Pemberdayaan Masyarakat'],
            ['asal' => 'Dinas Pendidikan', 'perihal' => 'Program Pendidikan Masyarakat Desa'],
            ['asal' => 'Polsek Gunungsari', 'perihal' => 'Koordinasi Keamanan Desa'],
            ['asal' => 'Koramil Gunungsari', 'perihal' => 'Pembinaan Wilayah'],
            ['asal' => 'Kecamatan Gunungsari', 'perihal' => 'Surat Edaran Administrasi Desa'],
            ['asal' => 'Dinas Kesehatan', 'perihal' => 'Program Kesehatan Lingkungan Desa'],
            ['asal' => 'Badan Pendapatan Daerah', 'perihal' => 'Administrasi Pajak Daerah'],
            ['asal' => 'Dinas Lingkungan Hidup', 'perihal' => 'Program Kebersihan Desa'],
            ['asal' => 'Kecamatan Gunungsari', 'perihal' => 'Undangan Evaluasi Program Desa'],
            ['asal' => 'Dinas Pertanian', 'perihal' => 'Program Pemberdayaan Petani Desa'],
            ['asal' => 'Kabupaten Serang', 'perihal' => 'Program Pemerintahan Desa'],
        ];

        foreach ($suratMasuk as $index => $item) {
            $nomorAgenda =
                'SM-' .
                str_pad($index + 1, 4, '0', STR_PAD_LEFT);

            $tanggal = Carbon::create(
                2026,
                ($index % 8) + 1,
                ($index % 20) + 1
            );

            $file = $this->createDummyPdf(
                'surat-masuk',
                strtolower($nomorAgenda) . '.pdf',
                $item['perihal']
            );

            SuratMasuk::firstOrCreate(
                [
                    'nomor_agenda' => $nomorAgenda,
                ],
                [
                    'nomor_surat' =>
                        '005/' .
                        str_pad($index + 1, 3, '0', STR_PAD_LEFT) .
                        '/2026',

                    'tanggal_surat' => $tanggal,

                    'tanggal_diterima' =>
                        $tanggal->copy()->addDays(2),

                    'asal_surat' => $item['asal'],

                    'perihal' => $item['perihal'],

                    'ditujukan_kepada' => 'Kepala Desa Luwuk',

                    'disposisi' => 'Ditindaklanjuti sesuai kebutuhan.',

                    'status' =>
                        $index % 3 === 0
                            ? 'diproses'
                            : 'diterima',

                    'file' => $file,

                    'keterangan' =>
                        'Data dummy untuk kebutuhan pengujian.',

                    'user_id' => $user->id,
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SURAT KELUAR
        |--------------------------------------------------------------------------
        */

        $suratKeluar = [
            'Undangan Rapat Pemerintah Desa',
            'Surat Pengantar Administrasi Desa',
            'Surat Keterangan Domisili',
            'Surat Keterangan Usaha',
            'Surat Keterangan Tidak Mampu',
            'Surat Undangan Musyawarah Desa',
            'Surat Pemberitahuan Kegiatan Desa',
            'Surat Pengantar Permohonan Administrasi',
            'Surat Undangan Kegiatan Pembangunan',
            'Surat Pemberitahuan Gotong Royong',
            'Surat Undangan Kegiatan Masyarakat',
            'Surat Rekomendasi Desa',
            'Surat Pengantar Dokumen',
            'Surat Pemberitahuan Pelayanan Desa',
            'Surat Undangan Evaluasi Kegiatan',
        ];

        foreach ($suratKeluar as $index => $perihal) {
            $nomorAgenda =
                'SK-' .
                str_pad($index + 1, 4, '0', STR_PAD_LEFT);

            $tanggal = Carbon::create(
                2026,
                ($index % 8) + 1,
                ($index % 20) + 1
            );

            $file = $this->createDummyPdf(
                'surat-keluar',
                strtolower($nomorAgenda) . '.pdf',
                $perihal
            );

            SuratKeluar::firstOrCreate(
                [
                    'nomor_agenda' => $nomorAgenda,
                ],
                [
                    'nomor_surat' =>
                        '140/' .
                        str_pad($index + 1, 3, '0', STR_PAD_LEFT) .
                        '/DS-LWK/2026',

                    'tanggal_surat' => $tanggal,

                    'tujuan_surat' =>
                        $index % 2 === 0
                            ? 'Kecamatan Gunungsari'
                            : 'Masyarakat Desa Luwuk',

                    'perihal' => $perihal,

                    'penandatangan' => 'Kepala Desa Luwuk',

                    'status' =>
                        $index % 3 === 0
                            ? 'draft'
                            : 'dikirim',

                    'file' => $file,

                    'keterangan' =>
                        'Data dummy untuk kebutuhan pengujian.',

                    'user_id' => $user->id,
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | PERANGKAT DESA
        |--------------------------------------------------------------------------
        */

        $perangkat = [
            ['nama' => 'Ahmad Fauzi', 'jabatan' => 'Kepala Desa'],
            ['nama' => 'Siti Aminah', 'jabatan' => 'Sekretaris Desa'],
            ['nama' => 'Budi Santoso', 'jabatan' => 'Kaur Keuangan'],
            ['nama' => 'Dewi Lestari', 'jabatan' => 'Kaur Tata Usaha dan Umum'],
            ['nama' => 'Rudi Hartono', 'jabatan' => 'Kaur Perencanaan'],
            ['nama' => 'Agus Setiawan', 'jabatan' => 'Kasi Pemerintahan'],
            ['nama' => 'Nurhayati', 'jabatan' => 'Kasi Kesejahteraan'],
            ['nama' => 'Dedi Irawan', 'jabatan' => 'Kasi Pelayanan'],
            ['nama' => 'Maman Suherman', 'jabatan' => 'Kepala Dusun I'],
            ['nama' => 'Yuni Kartika', 'jabatan' => 'Kepala Dusun II'],
        ];

        foreach ($perangkat as $index => $item) {
            $nipNik =
                '3201' .
                str_pad($index + 1, 12, '0', STR_PAD_LEFT);

            $foto = $this->createDummyImage(
                'perangkat-desa/foto',
                'perangkat-' . ($index + 1) . '.svg',
                $item['nama']
            );

            $fileSk = $this->createDummyPdf(
                'perangkat-desa/sk',
                'sk-perangkat-' . ($index + 1) . '.pdf',
                'SK ' . $item['nama']
            );

            PerangkatDesa::firstOrCreate(
                [
                    'nip_nik' => $nipNik,
                ],
                [
                    'nama' => $item['nama'],

                    'jabatan' => $item['jabatan'],

                    'nomor_sk' =>
                        'SK/' .
                        str_pad($index + 1, 3, '0', STR_PAD_LEFT) .
                        '/DS-LWK/2026',

                    'tanggal_sk' =>
                        Carbon::create(
                            2026,
                            1,
                            ($index % 20) + 1
                        ),

                    'status' =>
                        $index === 9
                            ? 'tidak_aktif'
                            : 'aktif',

                    'foto' => $foto,

                    'file_sk' => $fileSk,

                    'keterangan' =>
                        'Data dummy perangkat Desa Luwuk.',
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | KEGIATAN PEMBANGUNAN
        |--------------------------------------------------------------------------
        */

        $kegiatan = [
            [
                'nama_kegiatan' => 'Pembangunan Jalan Lingkungan Kampung Dukuh',
                'lokasi' => 'Kampung Dukuh',
                'anggaran' => 185000000,
                'volume' => '500 Meter',
                'status' => 'Perencanaan',
            ],
            [
                'nama_kegiatan' => 'Pembangunan Drainase Desa',
                'lokasi' => 'Kampung Luwuk',
                'anggaran' => 125000000,
                'volume' => '300 Meter',
                'status' => 'Perencanaan',
            ],
            [
                'nama_kegiatan' => 'Pembangunan Posyandu Desa',
                'lokasi' => 'Desa Luwuk',
                'anggaran' => 95000000,
                'volume' => '1 Unit',
                'status' => 'Perencanaan',
            ],
            [
                'nama_kegiatan' => 'Rehabilitasi Jalan Desa',
                'lokasi' => 'Kampung Pasir',
                'anggaran' => 210000000,
                'volume' => '700 Meter',
                'status' => 'Berjalan',
            ],
            [
                'nama_kegiatan' => 'Pembangunan Sarana Air Bersih',
                'lokasi' => 'Kampung Dukuh',
                'anggaran' => 150000000,
                'volume' => '1 Paket',
                'status' => 'Berjalan',
            ],
            [
                'nama_kegiatan' => 'Pembangunan Tembok Penahan Tanah',
                'lokasi' => 'Kampung Luwuk',
                'anggaran' => 175000000,
                'volume' => '250 Meter',
                'status' => 'Berjalan',
            ],
            [
                'nama_kegiatan' => 'Peningkatan Jalan Usaha Tani',
                'lokasi' => 'Kampung Cibadak',
                'anggaran' => 135000000,
                'volume' => '600 Meter',
                'status' => 'Berjalan',
            ],
            [
                'nama_kegiatan' => 'Pembangunan Lapangan Desa',
                'lokasi' => 'Desa Luwuk',
                'anggaran' => 160000000,
                'volume' => '1 Unit',
                'status' => 'Selesai',
            ],
            [
                'nama_kegiatan' => 'Pembangunan MCK Umum',
                'lokasi' => 'Kampung Dukuh',
                'anggaran' => 85000000,
                'volume' => '2 Unit',
                'status' => 'Selesai',
            ],
            [
                'nama_kegiatan' => 'Pembangunan Penerangan Jalan Desa',
                'lokasi' => 'Desa Luwuk',
                'anggaran' => 110000000,
                'volume' => '20 Titik',
                'status' => 'Selesai',
            ],
        ];

        $kegiatanModels = collect();

        foreach ($kegiatan as $index => $item) {
            $tanggalMulai = Carbon::create(
                2026,
                ($index % 6) + 1,
                ($index % 20) + 1
            );

            $tanggalSelesai =
                $item['status'] === 'Selesai'
                    ? $tanggalMulai->copy()->addMonths(2)
                    : null;

            $foto = $this->createDummyImage(
                'kegiatan-pembangunan',
                'kegiatan-' . ($index + 1) . '.svg',
                $item['nama_kegiatan']
            );

            $kegiatanModel = KegiatanPembangunan::firstOrCreate(
                [
                    'nama_kegiatan' => $item['nama_kegiatan'],
                    'tahun' => 2026,
                ],
                [
                    'lokasi' => $item['lokasi'],

                    'anggaran' => $item['anggaran'],

                    'sumber_dana' => 'Dana Desa',

                    'volume' => $item['volume'],

                    'pelaksana' =>
                        'Tim Pelaksana Kegiatan Desa',

                    'tanggal_mulai' => $tanggalMulai,

                    'tanggal_selesai' => $tanggalSelesai,

                    'status' => $item['status'],

                    'deskripsi' =>
                        'Data dummy kegiatan pembangunan Desa Luwuk.',

                    'foto' => $foto,
                ]
            );

            $kegiatanModels->push($kegiatanModel);
        }

        /*
        |--------------------------------------------------------------------------
        | DOKUMEN PEMBANGUNAN
        |--------------------------------------------------------------------------
        */

        $jenisDokumenPembangunan = [
            'RAB',
            'Proposal',
            'SPK',
            'Kontrak',
            'Laporan',
            'Berita Acara',
            'LPJ',
            'Dokumen Lainnya',
            'RAB',
            'Proposal',
            'Laporan',
            'Berita Acara',
            'LPJ',
            'SPK',
            'Dokumen Lainnya',
        ];

        foreach ($jenisDokumenPembangunan as $index => $jenis) {
            $kegiatanModel =
                $kegiatanModels[
                    $index % $kegiatanModels->count()
                ];

            $nomorDokumen =
                'DP/' .
                str_pad($index + 1, 3, '0', STR_PAD_LEFT) .
                '/DS-LWK/2026';

            $tanggal = Carbon::create(
                2026,
                ($index % 8) + 1,
                ($index % 20) + 1
            );

            $file = $this->createDummyPdf(
                'dokumen-pembangunan',
                'dp-' . ($index + 1) . '.pdf',
                $jenis
            );

            DokumenPembangunan::firstOrCreate(
                [
                    'nomor_dokumen' => $nomorDokumen,
                ],
                [
                    'kegiatan_pembangunan_id' =>
                        $kegiatanModel->id,

                    'nama_dokumen' =>
                        $jenis .
                        ' - ' .
                        $kegiatanModel->nama_kegiatan,

                    'tahun' => 2026,

                    'tanggal_dokumen' => $tanggal,

                    'jenis_dokumen' => $jenis,

                    'keterangan' =>
                        'Dokumen dummy kegiatan pembangunan Desa Luwuk.',

                    'file' => $file,
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DOKUMEN KEUANGAN
        |--------------------------------------------------------------------------
        */

        $jenisKeuangan = [
            'APBDes',
            'RAB',
            'SPJ',
            'LPJ',
            'Laporan Keuangan',
            'Bukti Pengeluaran',
            'Kwitansi',
            'Berita Acara',
            'Dokumen Lainnya',
            'APBDes',
            'RAB',
            'SPJ',
            'LPJ',
            'Laporan Keuangan',
            'Dokumen Lainnya',
        ];

        foreach ($jenisKeuangan as $index => $jenis) {
            $nomorDokumen =
                'DK/' .
                str_pad($index + 1, 3, '0', STR_PAD_LEFT) .
                '/DS-LWK/2026';

            $tanggal = Carbon::create(
                2026,
                ($index % 8) + 1,
                ($index % 20) + 1
            );

            $file = $this->createDummyPdf(
                'dokumen-keuangan',
                'dk-' . ($index + 1) . '.pdf',
                $jenis
            );

            DokumenKeuangan::firstOrCreate(
                [
                    'nomor_dokumen' => $nomorDokumen,
                ],
                [
                    'nama_dokumen' =>
                        $jenis . ' Desa Luwuk',

                    'tahun' => 2026,

                    'tanggal_dokumen' => $tanggal,

                    'jenis_dokumen' => $jenis,

                    'sumber_dana' =>
                        $index % 2 === 0
                            ? 'Dana Desa'
                            : 'Alokasi Dana Desa',

                    'keterangan' =>
                        'Dokumen dummy keuangan Desa Luwuk.',

                    'file' => $file,
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | HASIL
        |--------------------------------------------------------------------------
        */

        $this->command->info('');
        $this->command->info('==========================================');
        $this->command->info('DUMMY DATA BERHASIL DIPROSES');
        $this->command->info('==========================================');

        $this->command->info(
            'Kategori Arsip       : ' . KategoriArsip::count()
        );

        $this->command->info(
            'Arsip                 : ' . Arsip::count()
        );

        $this->command->info(
            'Surat Masuk           : ' . SuratMasuk::count()
        );

        $this->command->info(
            'Surat Keluar          : ' . SuratKeluar::count()
        );

        $this->command->info(
            'Perangkat Desa        : ' . PerangkatDesa::count()
        );

        $this->command->info(
            'Kegiatan Pembangunan : ' . KegiatanPembangunan::count()
        );

        $this->command->info(
            'Dokumen Pembangunan  : ' . DokumenPembangunan::count()
        );

        $this->command->info(
            'Dokumen Keuangan      : ' . DokumenKeuangan::count()
        );

        $this->command->info('==========================================');
    }
}