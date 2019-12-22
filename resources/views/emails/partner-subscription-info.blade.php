@component('mail::message')
# Introduction

<h1>Your Login Information</h1>
<p>Email: {{ $userEmail }}</p>
<p>Password: {{ $password }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
