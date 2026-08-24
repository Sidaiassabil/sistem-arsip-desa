<x-filament-panels::page>
    <div class="max-w-2xl">
        <form wire:submit="changePassword">
            {{ $this->form }}

            <div class="mt-6">
                <x-filament::button type="submit">
                    Simpan Password
                </x-filament::button>
            </div>
        </form>
    </div>
</x-filament-panels::page>