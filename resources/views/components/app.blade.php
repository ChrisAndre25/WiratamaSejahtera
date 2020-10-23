<x-base title="{{ $title }}">
    @if(isset($navbar))
    @include('include.navbar')
    @endif

    <main>
        {{ $slot }}
    </main>

    @if(isset($footer))
    @include('include.footer')
    @endif
</x-base>