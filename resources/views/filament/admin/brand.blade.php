<div
    style="
        display: flex;
        align-items: center;
        gap: 10px;
        height: 40px;
        max-height: 40px;
        overflow: hidden;
    "
>
    <img
        src="{{ asset('images/logo.png') }}"
        alt="Logo Desa Luwuk"
        style="
            width: 36px;
            height: 36px;
            max-width: 36px;
            max-height: 36px;
            object-fit: contain;
            display: block;
            flex-shrink: 0;
        "
    >

    <div style="line-height: 1.15;">

        {{-- Nama Sistem --}}
        <div
            class="text-gray-900 dark:text-white"
            style="
                font-size: 14px;
                font-weight: 700;
                white-space: nowrap;
            "
        >
            Sistem Arsip Desa
        </div>

        {{-- Nama Desa --}}
        <div
            class="text-gray-500 dark:text-gray-400"
            style="
                margin-top: 2px;
                font-size: 11px;
                white-space: nowrap;
            "
        >
            Desa Luwuk
        </div>

    </div>
</div>