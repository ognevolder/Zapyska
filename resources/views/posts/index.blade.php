<x-layout>
    <main class="h-screen flex flex-col items-center gap-[3.2rem]">
        <x-layout-navbar></x-layout-navbar>
        @if(session('success'))
            <x-flash-message type="success" :message="session('success')" />
        @endif

        @if(session('error'))
            <x-flash-message type="error" :message="session('error')" />
        @endif
        <x-post-grid>
            @foreach ($posts as $post)
                <x-post :post="$post"></x-post>
            @endforeach
        </x-post-grid>
        <x-layout-pagination :data="$posts"></x-layout-pagination>
        <x-footer>2025</x-footer>
    </main>
</x-layout>