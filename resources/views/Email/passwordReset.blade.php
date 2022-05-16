@component('mail::message')
# This is mail to reset your Secure account application.

Reset your password Useing below button.

@component('mail::button', ['url' => 'http://localhost:4200/response-password-reset?token='.$token])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent