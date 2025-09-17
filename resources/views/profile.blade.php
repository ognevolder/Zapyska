<x-layout>
    <x-layout-navbar></x-layout-navbar>
    <main class="flex flex-col items-center gap-4 my-4">
        <x-profile-header></x-profile-header>
        <x-profile :data="$posts"></x-profile>
    </main>
    <x-layout-footer>2025</x-layout-footer>
</x-layout>