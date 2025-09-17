<x-layout>
  <main class="w-full">
    <x-layout-navbar></x-layout-navbar>
    <x-layout-link href="/posts">← На головну</x-layout-link>
    <x-post-show :data="$post"></x-post-show>
    <x-layout-footer>2025</x-layout-footer>
  </main>
</x-layout>