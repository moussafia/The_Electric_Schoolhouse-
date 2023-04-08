@component('mail::message')
    #Reset password
    hello,
    You are receiving this email because we received a password reset request for your account.
@component('mail::button',['url' => $link, 'color' => 'linear-gradient(to right,#02a1db89,#a8cf459c)'])
Reset Password
@endcomponent

If you did not request a password reset, no further action is required.
Regards,<br>
{{ config('app.name') }}<br>
<img src="{{asset('assets/image/esh-logo.png')}}">
@endcomponent
