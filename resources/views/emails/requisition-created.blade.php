@component('mail::message')
# New Requisition

A new request for a vehicle has been made.

@component('mail::button', ['url' => ''])
View Requisitions
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
