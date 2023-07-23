@component('mail::message')
# New Company Created

A new company has been added with the following details:

**Name:** {{ $company->name }} <br>
**Email:** {{ $company->email }} <br>
**Website:** {{ $company->website }} <br>

Thank you for using our application.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
