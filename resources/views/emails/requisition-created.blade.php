@component('mail::message')
# New Requisition

A new request for a vehicle has been made.

Vehicle: {{ $details['vehicle']['make'] }} {{ $details['vehicle']['model'] }} - {{ $details['vehicle']['registration'] }}<br>
Purpose: {{ $details['requisition']['purpose'] }}

@component('mail::button', ['url' => url('/login')])
View Requisitions
@endcomponent

Thanks,<br>
{{-- {{ config('app.name') }} --}}
Vehicle Requisitions

THIS IS AN AUTOMATED MAIL. DO NOT REPLY. PLEASE GET IN TOUCH WITH I.T FOR FURTHER QUERIES.
@endcomponent
