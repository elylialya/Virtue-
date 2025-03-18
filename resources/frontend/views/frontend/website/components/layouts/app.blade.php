@props([
    'title' => null,
])
<x-website::layouts.base :title="$title">
    <div class="flex h-full min-h-screen flex-col">
        @hook('Frontend::Views::Header')

        {{-- Load Header Layout --}}
        <x-website::layouts.header />

            {{-- Load Main Layout --}}
            {{ $slot }}


        {{-- Load Footer Layout --}}
        <x-website::layouts.footer />

        @hook('Frontend::Views::Footer')
    </div>
</x-website::layouts.base>
