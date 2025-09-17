@php
    $colors = [
        'success' => 'bg-success border-none text-white',
        'error'   => 'bg-red-100 border-red-400 text-red-700',
        'warning' => 'bg-yellow-100 border-yellow-400 text-yellow-700',
        'info'    => 'bg-blue-100 border-blue-400 text-blue-700',
    ];
@endphp

@props(['type', 'message'])

<div
  class="flash-message px-4 py-3 border {{ $colors[$type] ?? $colors['info'] }}"
  data-timeout="3000">
    {{ $message }}
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll(".flash-message").forEach(el => {
            const timeout = el.dataset.timeout || 3000; // за замовчуванням 3 секунди
            setTimeout(() => {
                el.style.opacity = "0";
                setTimeout(() => el.remove(), 500); // ще 0.5с на анімацію
            }, timeout);
        });
    });
</script>