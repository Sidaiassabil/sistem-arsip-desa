<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Preview SK Perangkat Desa - {{ $perangkatDesa->nama }}
    </title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100">

    {{-- HEADER --}}
    <header class="bg-blue-700 text-white shadow-lg">

        <div class="max-w-7xl mx-auto px-4 py-5">

            <div
                class="flex flex-col md:flex-row md:items-center md:justify-between gap-4"
            >

                <div>

                    <p class="text-blue-200 text-sm">
                        Sistem Pengarsipan Desa Luwuk
                    </p>

                    <h1 class="text-xl md:text-2xl font-bold">
                        Preview SK Perangkat Desa
                    </h1>

                </div>

            </div>

        </div>

    </header>


    {{-- MAIN --}}
    <main class="max-w-7xl mx-auto px-4 py-6">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">


            {{-- INFORMASI PERANGKAT --}}
            <aside class="lg:col-span-1">

                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden"
                >

                    <div
                        class="bg-blue-50 px-5 py-4 border-b border-blue-100"
                    >

                        <h2 class="font-bold text-blue-800">
                            Informasi Perangkat Desa
                        </h2>

                    </div>


                    <div class="p-5 space-y-4">


                        {{-- FOTO --}}
                        @if ($perangkatDesa->foto)

                            <div class="flex justify-center pb-2">

                                <img
                                    src="{{ asset('storage/' . $perangkatDesa->foto) }}"
                                    alt="{{ $perangkatDesa->nama }}"
                                    class="w-28 h-28 object-cover rounded-xl border border-slate-200 shadow-sm"
                                >

                            </div>

                        @endif


                        {{-- NAMA --}}
                        <div>

                            <p class="text-xs text-slate-500">
                                Nama
                            </p>

                            <p class="font-semibold text-slate-800">
                                {{ $perangkatDesa->nama ?: '-' }}
                            </p>

                        </div>


                        {{-- JABATAN --}}
                        <div>

                            <p class="text-xs text-slate-500">
                                Jabatan
                            </p>

                            <p class="font-semibold text-slate-800">
                                {{ $perangkatDesa->jabatan ?: '-' }}
                            </p>

                        </div>


                        {{-- NIP / NIK --}}
                        <div>

                            <p class="text-xs text-slate-500">
                                NIP / NIK
                            </p>

                            <p class="font-semibold text-slate-800">
                                {{ $perangkatDesa->nip_nik ?: '-' }}
                            </p>

                        </div>


                        {{-- NOMOR SK --}}
                        <div>

                            <p class="text-xs text-slate-500">
                                Nomor SK
                            </p>

                            <p class="font-semibold text-slate-800">
                                {{ $perangkatDesa->nomor_sk ?: '-' }}
                            </p>

                        </div>


                        {{-- TANGGAL SK --}}
                        <div>

                            <p class="text-xs text-slate-500">
                                Tanggal SK
                            </p>

                            <p class="font-semibold text-slate-800">
                                {{ $perangkatDesa->tanggal_sk?->format('d M Y') ?: '-' }}
                            </p>

                        </div>


                        {{-- STATUS --}}
                        <div>

                            <p class="text-xs text-slate-500">
                                Status
                            </p>

                            @if ($perangkatDesa->status === 'aktif')

                                <span
                                    class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700"
                                >
                                    Aktif
                                </span>

                            @else

                                <span
                                    class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700"
                                >
                                    Tidak Aktif
                                </span>

                            @endif

                        </div>


                        {{-- KETERANGAN --}}
                        @if ($perangkatDesa->keterangan)

                            <div>

                                <p class="text-xs text-slate-500">
                                    Keterangan
                                </p>

                                <p class="font-semibold text-slate-800">
                                    {{ $perangkatDesa->keterangan }}
                                </p>

                            </div>

                        @endif

                    </div>

                </div>

            </aside>


            {{-- PREVIEW --}}
            <section class="lg:col-span-3">

                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden"
                >


                    {{-- JUDUL --}}
                    <div class="px-5 py-4 border-b border-slate-200">

                        <h2 class="font-bold text-slate-800">
                            Surat Keputusan Perangkat Desa
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            {{ $perangkatDesa->nomor_sk ?: 'Dokumen SK' }}
                        </p>

                    </div>


                    {{-- DOKUMEN --}}
                    <div class="bg-slate-50 p-4">

                        @if ($canPreview)

                            <iframe
                                src="{{ $fileUrl }}"
                                class="w-full h-[75vh] rounded-lg border border-slate-200 bg-white"
                            ></iframe>

                        @else

                            <div
                                class="min-h-[400px] flex items-center justify-center"
                            >

                                <div class="text-center">

                                    <div class="text-5xl mb-4">
                                        📄
                                    </div>

                                    <h3 class="font-bold text-slate-800">
                                        Preview tidak tersedia
                                    </h3>

                                    <p class="text-sm text-slate-500 mt-2">
                                        Format file SK ini tidak dapat
                                        ditampilkan langsung di browser.
                                    </p>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

            </section>

        </div>

    </main>

</body>

</html>