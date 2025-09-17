<x-layout>
    <main class="h-screen flex flex-col items-center">
        <x-layout-navbar></x-layout-navbar>

        <x-layout-link href="/posts">← Назад</x-layout-link>

        <x-layout-message></x-layout-message>
        <x-layout-header>Останні публікації:</x-layout-header>

        <x-post-grid>
            @foreach ($posts as $post)
                <x-post :post="$post"></x-post>
            @endforeach
        </x-post-grid>

        <x-layout-pagination :data="$posts"></x-layout-pagination>

        <x-layout-footer>2025</x-layout-footer>
    </main>
</x-layout>