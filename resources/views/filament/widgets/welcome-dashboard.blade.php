<x-filament-widgets::widget>
    <div class="welcome-card">

        {{-- Dekorasi --}}
        <div class="welcome-circle welcome-circle-1"></div>
        <div class="welcome-circle welcome-circle-2"></div>

        <div class="welcome-content">

            {{-- KONTEN --}}
            <div class="welcome-left">

                <div class="welcome-brand">
                    <div class="welcome-icon">
                        <x-filament::icon
                            icon="heroicon-o-building-library"
                        />
                    </div>

                    <div>
                        <div class="welcome-label">
                            SISTEM PENGARSIPAN DESA
                        </div>

                        <div class="welcome-title">
                            Selamat Datang <span>👋</span>
                        </div>

                        <div class="welcome-village">
                            Desa Luwuk
                        </div>
                    </div>
                </div>

                <p class="welcome-description">
                    Kelola arsip, surat, pemerintahan, pembangunan,
                    dan keuangan desa dengan lebih mudah, tertata,
                    dan terintegrasi.
                </p>

                @php
                    $hari = [
                        'Sunday' => 'Minggu',
                        'Monday' => 'Senin',
                        'Tuesday' => 'Selasa',
                        'Wednesday' => 'Rabu',
                        'Thursday' => 'Kamis',
                        'Friday' => 'Jumat',
                        'Saturday' => 'Sabtu',
                    ];

                    $bulan = [
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember',
                    ];

                    $tanggal = now('Asia/Jakarta');
                @endphp

                <div class="welcome-info">

                    <div class="welcome-info-item">
                        <div class="welcome-info-icon">
                            <x-filament::icon icon="heroicon-o-calendar-days" />
                        </div>

                        <div>
                            <div class="welcome-info-label">
                                Hari ini
                            </div>

                            <div class="welcome-info-value">
                                {{ $hari[$tanggal->format('l')] }},
                                {{ $tanggal->format('d') }}
                                {{ $bulan[(int) $tanggal->format('m')] }}
                                {{ $tanggal->format('Y') }}
                            </div>
                        </div>
                    </div>

                    <div class="welcome-info-item">
                        <div class="welcome-info-icon">
                            <x-filament::icon icon="heroicon-o-clock" />
                        </div>

                        <div>
                            <div class="welcome-info-label">
                                Waktu
                            </div>

                            <div class="welcome-info-value">
                                {{ $tanggal->format('H:i') }} WIB
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            {{-- ILUSTRASI --}}
            <div class="welcome-illustration">

                <svg
                    viewBox="0 0 620 330"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-label="Ilustrasi Kantor Desa Luwuk"
                >

                    {{-- Pohon kiri --}}
                    <circle cx="70" cy="220" r="45" fill="#22c55e"/>
                    <circle cx="110" cy="195" r="55" fill="#4ade80"/>
                    <circle cx="48" cy="190" r="38" fill="#16a34a"/>
                    <rect x="78" y="220" width="14" height="75" rx="7" fill="#92400e"/>

                    {{-- Pohon kanan --}}
                    <circle cx="550" cy="220" r="48" fill="#22c55e"/>
                    <circle cx="585" cy="190" r="52" fill="#4ade80"/>
                    <circle cx="515" cy="195" r="40" fill="#16a34a"/>
                    <rect x="548" y="220" width="14" height="75" rx="7" fill="#92400e"/>

                    {{-- Gedung --}}
                    <rect
                        x="145"
                        y="150"
                        width="340"
                        height="145"
                        rx="5"
                        fill="#ffffff"
                        stroke="#cbd5e1"
                        stroke-width="3"
                    />

                    {{-- Atap --}}
                    <path
                        d="M110 155 L315 45 L520 155 Z"
                        fill="#334155"
                    />

                    <path
                        d="M140 150 L315 65 L490 150 Z"
                        fill="#475569"
                    />

                    {{-- Segitiga depan --}}
                    <path
                        d="M230 142 L315 88 L400 142 Z"
                        fill="#e2e8f0"
                    />

                    {{-- Pilar --}}
                    <rect x="195" y="150" width="25" height="145" fill="#f8fafc"/>
                    <rect x="260" y="150" width="25" height="145" fill="#f8fafc"/>
                    <rect x="345" y="150" width="25" height="145" fill="#f8fafc"/>
                    <rect x="410" y="150" width="25" height="145" fill="#f8fafc"/>

                    {{-- Pintu --}}
                    <rect
                        x="290"
                        y="215"
                        width="50"
                        height="80"
                        rx="4"
                        fill="#2563eb"
                    />

                    <circle
                        cx="328"
                        cy="255"
                        r="3"
                        fill="#facc15"
                    />

                    {{-- Jendela kiri --}}
                    <rect
                        x="158"
                        y="190"
                        width="45"
                        height="48"
                        rx="3"
                        fill="#bfdbfe"
                        stroke="#64748b"
                        stroke-width="3"
                    />

                    <path
                        d="M180 190V238M158 214H203"
                        stroke="#64748b"
                        stroke-width="2"
                    />

                    {{-- Jendela kanan --}}
                    <rect
                        x="427"
                        y="190"
                        width="45"
                        height="48"
                        rx="3"
                        fill="#bfdbfe"
                        stroke="#64748b"
                        stroke-width="3"
                    />

                    <path
                        d="M449 190V238M427 214H472"
                        stroke="#64748b"
                        stroke-width="2"
                    />

                    {{-- Papan nama --}}
                    <rect
                        x="220"
                        y="145"
                        width="190"
                        height="38"
                        rx="5"
                        fill="#ffffff"
                        stroke="#cbd5e1"
                        stroke-width="2"
                    />

                    <text
                        x="315"
                        y="170"
                        text-anchor="middle"
                        fill="#334155"
                        font-size="15"
                        font-weight="700"
                        font-family="Arial, sans-serif"
                    >
                        KANTOR DESA LUWUK
                    </text>

                    {{-- Tiang bendera --}}
                    <rect
                        x="505"
                        y="65"
                        width="5"
                        height="145"
                        fill="#64748b"
                    />

                    {{-- Bendera Indonesia --}}
                    <rect
                        x="510"
                        y="68"
                        width="70"
                        height="22"
                        fill="#ef4444"
                    />

                    <rect
                        x="510"
                        y="90"
                        width="70"
                        height="22"
                        fill="#ffffff"
                    />

                    {{-- Jalan --}}
                    <path
                        d="M0 330
                           C130 285 220 285 315 310
                           C410 335 500 290 620 275
                           L620 330 Z"
                        fill="#cbd5e1"
                    />

                </svg>

            </div>

        </div>
    </div>


    <style>
        .welcome-card {
            position: relative;
            overflow: hidden;
            min-height: 285px;
            border-radius: 18px;
            border: 1px solid #dbeafe;
            background:
                linear-gradient(115deg, #eff6ff 0%, #ffffff 48%, #dbeafe 100%);
            box-shadow:
                0 8px 25px rgba(15, 23, 42, 0.08);
        }

        .welcome-content {
            position: relative;
            z-index: 2;
            display: flex;
            min-height: 285px;
        }

        .welcome-left {
            width: 58%;
            padding: 32px 35px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .welcome-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .welcome-icon {
            width: 58px;
            height: 58px;
            min-width: 58px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            color: #2563eb;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.12);
        }

        .welcome-icon svg {
            width: 30px;
            height: 30px;
        }

        .welcome-label {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.08em;
            color: #2563eb;
        }

        .welcome-title {
            margin-top: 3px;
            font-size: 28px;
            line-height: 1.2;
            font-weight: 800;
            color: #0f172a;
        }

        .welcome-title span {
            font-size: 25px;
        }

        .welcome-village {
            margin-top: 4px;
            font-size: 14px;
            font-weight: 600;
            color: #64748b;
        }

        .welcome-description {
            max-width: 600px;
            margin: 18px 0 0;
            font-size: 14px;
            line-height: 1.7;
            color: #475569;
        }

        .welcome-info {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }

        .welcome-info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.85);
            border: 1px solid #dbeafe;
        }

        .welcome-info-icon {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: #eff6ff;
            color: #2563eb;
        }

        .welcome-info-icon svg {
            width: 18px;
            height: 18px;
        }

        .welcome-info-label {
            font-size: 11px;
            color: #64748b;
        }

        .welcome-info-value {
            margin-top: 2px;
            font-size: 12px;
            font-weight: 700;
            color: #1e293b;
        }

        .welcome-illustration {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 45%;
            height: 100%;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            overflow: hidden;
        }

        .welcome-illustration svg {
            display: block;
            width: 500px;
            max-width: 100%;
            height: auto;
            margin-bottom: -5px;
        }

        .welcome-circle {
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .welcome-circle-1 {
            width: 180px;
            height: 180px;
            right: -60px;
            top: -70px;
            background: rgba(147, 197, 253, 0.25);
        }

        .welcome-circle-2 {
            width: 120px;
            height: 120px;
            left: 42%;
            bottom: -70px;
            background: rgba(191, 219, 254, 0.35);
        }

        @media (max-width: 900px) {
            .welcome-left {
                width: 100%;
                padding: 25px;
            }

            .welcome-illustration {
                display: none;
            }

            .welcome-content {
                min-height: auto;
            }
        }

        @media (max-width: 640px) {
            .welcome-title {
                font-size: 23px;
            }

            .welcome-description {
                font-size: 13px;
            }

            .welcome-info {
                flex-direction: column;
            }

            .welcome-info-item {
                width: 100%;
            }
        }

        @media (prefers-color-scheme: dark) {
            .welcome-card {
                background:
                    linear-gradient(115deg, #172554 0%, #111827 55%, #1e3a8a 100%);
                border-color: #1e3a8a;
            }

            .welcome-title {
                color: #ffffff;
            }

            .welcome-description {
                color: #cbd5e1;
            }

            .welcome-village {
                color: #94a3b8;
            }

            .welcome-icon {
                background: #1e293b;
            }

            .welcome-info-item {
                background: rgba(30, 41, 59, 0.85);
                border-color: #334155;
            }

            .welcome-info-value {
                color: #f8fafc;
            }

            .welcome-info-label {
                color: #94a3b8;
            }

            .welcome-info-icon {
                background: #172554;
            }
        }
    </style>
</x-filament-widgets::widget>