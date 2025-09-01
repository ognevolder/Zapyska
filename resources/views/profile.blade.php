<x-layout>
    <main class="h-screen flex flex-col items-center gap-[1.6rem]">
        <x-layout-navbar></x-layout-navbar>
        <x-profile-header></x-profile-header>
        <x-profile :data="$posts"></x-profile>
        <x-footer>2025</x-footer>
    </main>
</x-layout>