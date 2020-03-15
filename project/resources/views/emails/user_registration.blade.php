@component('mail::message')
# You Have Access

Dear {{$user->name}},

A user account has been created for you at {{url('/')}}

Email: {{$user->email}}

Password: {{$generated_password}}

@component('mail::button', ['url' => url('/login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent