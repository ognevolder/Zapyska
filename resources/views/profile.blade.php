@auth
    <p>Привіт, {{ auth()->user()->name }}!</p>
@endauth
<form action="/logout" method="POST">
    @csrf
    <button>Logout</button>
</form>
@can('view-admin-panel')
    <a href="{{ route('admin.dashboard') }}">Адмін панель</a>
@endcan
