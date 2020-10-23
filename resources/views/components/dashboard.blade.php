<x-base title="{{ $title }}">
    @if(isset($navbar))
        @include('include.navbar')
    @endif

    <main>
        <div class="container mt-5 px-4 px-lg-5 py-4">
        {{ $slot }}
        </div>
    </main>
</x-base>