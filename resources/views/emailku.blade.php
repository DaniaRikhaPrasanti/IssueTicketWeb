
@component('mail::message')
# {{ $data['title'] }}
Anda sudah terdaftar ke aplikasi kami. Silahkan login dengan email dan password berikut.<br>
Email : {{ $data['email'] }}<br>
Password : {{ $data['password'] }}<br>
 
@component('mail::button', ['url' => $data['url']])
Visit
@endcomponent
 
Terimakasih,<br>
{{ config('app.name') }}
@endcomponent