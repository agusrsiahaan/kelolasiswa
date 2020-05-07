@component('mail::message')
# Pendaftaran Siswa

Selamat anda telah terdaftar di SMK 200 Batam

@component('mail::button', ['url' => ''])
Klik Disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
