@component('mail::message')
# New Requestion

Hello.

{{ $details['employee']['first_name']}} {{ $details['employee']['last_name']}} has requested to use a vehicle. See the details below.

Purpose: {{ $details['requisition']['purpose']}}<br>
Start Date: {{ date('l jS F Y', (strtotime($details['requisition']['start_date']))) }}<br>
Return Date: {{ date('l jS F Y', (strtotime($details['requisition']['return_date']))) }}<br>
First-line Approval: {{ $details['officer']['first_name']}} {{ $details['officer']['last_name']}}


@component('mail::button', ['url' => url('/login')])
View Requisitions
@endcomponent

Thanks,<br>
Vehicle Requisitions

THIS IS AN AUTOMATED MAIL. DO NOT REPLY.
@endcomponent
