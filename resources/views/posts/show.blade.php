<x-layout>
  <main class="h-screen flex flex-col items-center gap-[3.2rem]">
    <x-layout-navbar></x-layout-navbar>
    <x-layout-link href="/posts">← На головну</x-layout-link>
    <x-post-show :data="$post"></x-post-show>
    <x-footer>2025</x-footer>
  </main>
</x-layout>