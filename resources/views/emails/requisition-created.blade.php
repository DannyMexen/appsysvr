@component('mail::message')
# New Requisition

A new request for a vehicle has been made.

Reason for using vehicle: {{ $requisition->purpose }}

@component('mail::button', ['url' => url('/login')])
View Requisitions
@endcomponent

Thanks,<br>
{{-- {{ config('app.name') }} --}}
Vehicle Requisitions

THIS IS AN AUTOMATED MAIL. DO NOT REPLY TO IT. PLEASE GET IN TOUCH WITH IT FOR FURTHER QUERIES.
@endcomponent
