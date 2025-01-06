@component('mail::message')
# PCNU Kota Batam

Hello {{ $user->name }},

We received a request to reset your password. Please click the button below to reset your password.

@component('mail::button', ['url' => url('/update-password?email='.$user->email.'&verify='.$user->remember_token)])
Reset Password
@endcomponent

If you didn’t request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent