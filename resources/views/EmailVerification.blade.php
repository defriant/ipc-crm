@component('mail::message')

This is your 6-digit verification code : <br><br>
<p style="text-align: center; font-size: 35px;"><b>{{ $mail_data['code'] }}</b></p><br>

@endcomponent
