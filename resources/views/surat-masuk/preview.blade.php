<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $surat->nomor_agenda }} - {{ $surat->perihal }}
    </title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #1D4ED8;
            --primary-dark: #1E3A8A;
            --primary-soft: #EFF6FF;

            --secondary: #64748B;

            --text: #0F172A;
            --text-soft: #475569;

            --border: #E2E8F0;

            --background: #F5F7FB;

            --white: #FFFFFF;

            --success-bg: #DCFCE7;
            --success-text: #166534;

            --warning-bg: #FEF3C7;
            --warning-text: #92400E;

            --danger-bg: #FEE2E2;
            --danger-text: #991B1B;

            --shadow:
                0 10px 30px rgba(15, 23, 42, 0.06);
        }

        body {
            margin: 0;
            background: var(--background);
            color: var(--text);
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }

        a {
            text-decoration: none;
        }

        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);

            position: sticky;
            top: 0;

            z-index: 100;
        }

        .topbar-inner {
            max-width: 1400px;
            margin: auto;

            padding: 16px 30px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            color: var(--text-soft);

            font-size: 14px;
            font-weight: 600;

            transition: 0.2s;
        }

        .back-link:hover {
            color: var(--primary);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;

            color: var(--primary);

            font-size: 14px;
            font-weight: 700;
        }

        .brand-icon {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: var(--primary-soft);
            color: var(--primary);

            font-size: 16px;
        }

        /* =====================================================
           MAIN
        ===================================================== */

        .container {
            max-width: 1400px;
            margin: auto;

            padding: 30px;
        }

        /* =====================================================
           DOCUMENT HEADER
        ===================================================== */

        .document-header {
            background: var(--white);

            border: 1px solid var(--border);

            border-radius: 18px;

            padding: 30px;

            box-shadow: var(--shadow);
        }

        .header-top {
            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            gap: 30px;
        }

        .label {
            color: var(--primary);

            font-size: 12px;

            font-weight: 800;

            letter-spacing: 0.08em;

            text-transform: uppercase;

            margin-bottom: 8px;
        }

        .code {
            display: inline-flex;

            align-items: center;

            background: var(--primary-soft);

            color: var(--primary);

            padding: 6px 10px;

            border-radius: 7px;

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 12px;
        }

        .title {
            margin: 0;

            max-width: 900px;

            font-size: 30px;

            line-height: 1.25;

            font-weight: 750;

            letter-spacing: -0.02em;
        }

        .description {
            max-width: 850px;

            margin-top: 12px;

            color: var(--secondary);

            font-size: 15px;

            line-height: 1.6;
        }

        /* =====================================================
           STATUS
        ===================================================== */

        .status {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 8px 13px;

            border-radius: 999px;

            font-size: 13px;

            font-weight: 700;

            white-space: nowrap;
        }

        .status-diterima {
            background: var(--success-bg);
            color: var(--success-text);
        }

        .status-diproses {
            background: var(--warning-bg);
            color: var(--warning-text);
        }

        .status-did disposisi {
            background: var(--primary-soft);
            color: var(--primary);
        }

        .status-selesai {
            background: var(--success-bg);
            color: var(--success-text);
        }

        .status-dot {
            width: 7px;

            height: 7px;

            border-radius: 50%;

            background: currentColor;
        }

        /* =====================================================
           INFO
        ===================================================== */

        .info-grid {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 12px;

            margin-top: 28px;
        }

        .info-card {
            background: #F8FAFC;

            border: 1px solid var(--border);

            border-radius: 12px;

            padding: 17px;
        }

        .info-label {
            color: var(--secondary);

            font-size: 12px;

            font-weight: 600;

            margin-bottom: 7px;
        }

        .info-value {
            color: var(--text);

            font-size: 14px;

            font-weight: 700;

            word-break: break-word;
        }

        /* =====================================================
           ACTIONS
        ===================================================== */

        .actions {
            display: flex;

            justify-content: flex-end;

            gap: 10px;

            margin-top: 26px;
        }

        .button {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 11px 17px;

            border-radius: 9px;

            font-size: 14px;

            font-weight: 700;

            transition: all 0.2s ease;
        }

        .button-edit {
            background: #F1F5F9;

            color: var(--text);
        }

        .button-edit:hover {
            background: #E2E8F0;
        }

        .button-download {
            background: var(--primary);

            color: var(--white);

            box-shadow:
                0 4px 12px
                rgba(29, 78, 216, 0.20);
        }

        .button-download:hover {
            background: var(--primary-dark);

            transform: translateY(-1px);
        }

        /* =====================================================
           PREVIEW SECTION
        ===================================================== */

        .preview-section {
            margin-top: 26px;
        }

        .section-header {
            display: flex;

            align-items: flex-end;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 13px;
        }

        .section-title {
            margin: 0;

            font-size: 18px;

            font-weight: 750;
        }

        .section-subtitle {
            margin-top: 4px;

            color: var(--secondary);

            font-size: 13px;
        }

        .document-viewer {
            background: var(--primary-dark);

            border-radius: 17px;

            padding: 10px;

            box-shadow:
                0 12px 35px
                rgba(15, 23, 42, 0.12);
        }

        iframe {
            width: 100%;

            height: 780px;

            border: 0;

            display: block;

            border-radius: 11px;

            background: var(--white);
        }

        .image-preview {
            width: 100%;

            height: 780px;

            object-fit: contain;

            display: block;

            border-radius: 11px;

            background: var(--white);
        }

        /* =====================================================
           UNSUPPORTED FILE
        ===================================================== */

        .unsupported {
            min-height: 550px;

            background: var(--white);

            border-radius: 11px;

            display: flex;

            align-items: center;

            justify-content: center;

            text-align: center;

            padding: 30px;
        }

        .file-icon {
            width: 70px;

            height: 70px;

            margin: 0 auto 20px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 18px;

            background: var(--primary-soft);

            color: var(--primary);

            font-size: 30px;
        }

        .unsupported h2 {
            margin: 0 0 8px;

            font-size: 20px;
        }

        .unsupported p {
            max-width: 500px;

            margin: 0 auto 20px;

            color: var(--secondary);

            line-height: 1.6;
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            text-align: center;

            padding: 25px 0 35px;

            color: var(--secondary);

            font-size: 12px;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1100px) {

            .info-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .header-top {
                flex-direction: column;
            }

            .actions {
                justify-content: flex-start;
            }
        }

        @media (max-width: 700px) {

            .topbar-inner {
                padding: 14px 16px;
            }

            .brand {
                display: none;
            }

            .container {
                padding: 16px;
            }

            .document-header {
                padding: 20px;

                border-radius: 14px;
            }

            .title {
                font-size: 23px;
            }

            .description {
                font-size: 14px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
            }

            .button {
                width: 100%;
            }

            .section-header {
                align-items: flex-start;

                flex-direction: column;
            }

            .document-viewer {
                padding: 6px;

                border-radius: 13px;
            }

            iframe,
            .image-preview {
                height: 600px;

                border-radius: 8px;
            }

            .unsupported {
                min-height: 450px;
            }
        }
    </style>

</head>


<body>

    {{-- =====================================================
         TOPBAR
    ====================================================== --}}

    <header class="topbar">

        <div class="topbar-inner">

            <a
                href="{{ url('/admin/surat-masuks') }}"
                class="back-link"
            >
                ←
                Kembali ke Surat Masuk
            </a>

            <div class="brand">

                <div class="brand-icon">
                    ✉
                </div>

                Sistem Pengarsipan Desa Luwuk

            </div>

        </div>

    </header>


    <main class="container">

        {{-- =================================================
             DOCUMENT INFORMATION
        ================================================== --}}

        <section class="document-header">

            <div class="header-top">

                <div>

                    <div class="label">
                        Surat Masuk
                    </div>

                    <div class="code">
                        {{ $surat->nomor_agenda }}
                    </div>

                    <h1 class="title">
                        {{ $surat->perihal }}
                    </h1>

                    <div class="description">
                        Surat masuk dari
                        <strong>
                            {{ $surat->asal_surat ?: '-' }}
                        </strong>
                        yang ditujukan kepada
                        <strong>
                            {{ $surat->ditujukan_kepada ?: '-' }}
                        </strong>.
                    </div>

                </div>


                {{-- STATUS --}}

                <div>

                    @php
                        $statusClass = match ($surat->status) {
                            'diterima' => 'status-diterima',
                            'diproses' => 'status-diproses',
                            'didisposisi' => 'status-did disposisi',
                            'selesai' => 'status-selesai',
                            default => 'status-diproses',
                        };

                        $statusLabel = match ($surat->status) {
                            'diterima' => 'Diterima',
                            'diproses' => 'Diproses',
                            'didisposisi' => 'Didisposisi',
                            'selesai' => 'Selesai',
                            default => ucfirst($surat->status),
                        };
                    @endphp

                    <span class="status {{ $statusClass }}">

                        <span class="status-dot"></span>

                        {{ $statusLabel }}

                    </span>

                </div>

            </div>


            {{-- =================================================
                 INFORMATION CARDS
            ================================================== --}}

            <div class="info-grid">

                <div class="info-card">

                    <div class="info-label">
                        Nomor Surat
                    </div>

                    <div class="info-value">
                        {{ $surat->nomor_surat ?: '-' }}
                    </div>

                </div>


                <div class="info-card">

                    <div class="info-label">
                        Asal Surat
                    </div>

                    <div class="info-value">
                        {{ $surat->asal_surat ?: '-' }}
                    </div>

                </div>


                <div class="info-card">

                    <div class="info-label">
                        Tanggal Surat
                    </div>

                    <div class="info-value">
                        {{ $surat->tanggal_surat?->format('d M Y') ?? '-' }}
                    </div>

                </div>


                <div class="info-card">

                    <div class="info-label">
                        Tanggal Diterima
                    </div>

                    <div class="info-value">
                        {{ $surat->tanggal_diterima?->format('d M Y') ?? '-' }}
                    </div>

                </div>

            </div>


            {{-- =================================================
                 ACTION BUTTONS
            ================================================== --}}

            <div class="actions">

                <a
                    href="{{ url('/admin/surat-masuks/' . $surat->id . '/edit') }}"
                    class="button button-edit"
                >
                    ✏️
                    Edit Surat
                </a>

                <a
                    href="{{ route('surat-masuk.download', $surat) }}"
                    class="button button-download"
                >
                    ↓
                    Download Surat
                </a>

            </div>

        </section>


        {{-- =================================================
             DOCUMENT PREVIEW
        ================================================== --}}

        <section class="preview-section">

            <div class="section-header">

                <div>

                    <h2 class="section-title">
                        Preview Dokumen
                    </h2>

                    <div class="section-subtitle">

                        {{ $surat->nomor_agenda }}

                        —

                        {{ $surat->perihal }}

                    </div>

                </div>

            </div>


            <div class="document-viewer">

                @php

                    $extension = strtolower(
                        pathinfo(
                            $surat->file,
                            PATHINFO_EXTENSION
                        )
                    );

                @endphp


                {{-- PDF --}}

                @if ($extension === 'pdf')

                    <iframe
                        src="{{ route('surat-masuk.file', $surat) }}"
                        title="{{ $surat->nomor_agenda }} - {{ $surat->perihal }}"
                    ></iframe>


                {{-- IMAGE --}}

                @elseif (
                    in_array(
                        $extension,
                        ['jpg', 'jpeg', 'png']
                    )
                )

                    <img
                        src="{{ route('surat-masuk.file', $surat) }}"
                        alt="{{ $surat->perihal }}"
                        class="image-preview"
                    >


                {{-- OTHER FILE --}}

                @else

                    <div class="unsupported">

                        <div>

                            <div class="file-icon">
                                📄
                            </div>

                            <h2>
                                Preview Tidak Tersedia
                            </h2>

                            <p>

                                File dengan format

                                <strong>
                                    .{{ $extension }}
                                </strong>

                                tidak dapat ditampilkan
                                langsung di browser.

                                Silakan download dokumen
                                untuk membukanya.

                            </p>

                            <a
                                href="{{ route('surat-masuk.download', $surat) }}"
                                class="button button-download"
                            >
                                ↓
                                Download Surat
                            </a>

                        </div>

                    </div>

                @endif

            </div>

        </section>


        {{-- =================================================
             FOOTER
        ================================================== --}}

        <footer class="footer">

            Sistem Pengarsipan Data Desa Luwuk

        </footer>

    </main>

</body>

</html>