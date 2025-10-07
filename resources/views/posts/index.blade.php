<x-layout>
    <x-layout-navbar></x-layout-navbar>
    <main class="mt-8 flex flex-col items-center">
        <x-layout-message></x-layout-message>
        <x-layout-header>Останні публікації:</x-layout-header>

        <x-post-grid>
            @foreach ($posts as $post)
                <x-post :post="$post"></x-post>
            @endforeach
        </x-post-grid>

        <x-layout-pagination :data="$posts"></x-layout-pagination>
    </main>
    <x-layout-footer>2025</x-layout-footer>
</x-layout>