@component('mail::message')
# Підтвердження електронної пошти

Будь ласка, натисніть кнопку нижче, щоб підтвердити свій email:

@component('mail::button', ['url' => $url])
Підтвердити Email
@endcomponent

Дякуємо,
{{ config('app.name') }}
@endcomponent