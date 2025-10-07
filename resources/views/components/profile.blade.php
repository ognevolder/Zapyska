@props(['data'])

<section class="w-full 2xl:w-[1440px] flex flex-col gap-4 justify-between border-[0.5px] border-lightgreen bg-[#fff]">
  <div id="profile_container">
  </div>

  <section id="profile" class="w-full">
    <h2 class="w-full py-2 text-base text-darkgreen font-display font-semibold uppercase">Останні публікації:</h2>

    <div class="flex flex-col gap-4">
      @if(session('success'))
        <x-flash-message type="success" :message="session('success')" />
      @endif

      @if(session('error'))
        <x-flash-message type="error" :message="session('error')" />
      @endif

      @foreach ($data as $post)
        <x-profile-post :post="$post"></x-profile-post>
      @endforeach
    </div>
  </section>
</section>

<script>
document.getElementById('profile-info').addEventListener('click', function() {
    fetch("{{ route('profile.info') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('profile_container').innerHTML = `
            <p><strong>Ім’я:</strong> ${data.name}</p>
            <p><strong>Email:</strong> ${data.email}</p>
            <p><strong>Дата реєстрації:</strong> ${data.registered}</p>
        `;
        document.getElementById('profile_container').classList.remove('hidden');
    })
    .catch(err => console.error(err));
});
</script>