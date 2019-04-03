@component('mail::message')
# Requisition Approved

Hello.

Your requisition has been approved. See the details below.

Purpose: {{ $details['requisition']['purpose']}}<br>
Start Date: {{ date('l jS F Y', (strtotime($details['requisition']['start_date']))) }}<br>
Return Date: {{ date('l jS F Y', (strtotime($details['requisition']['return_date']))) }}<br>
First-line Approval: {{ $details['officer']['first_name']}} {{ $details['officer']['last_name']}}<br>
Managerial Approval: {{ $details['manager']['first_name']}} {{ $details['manager']['last_name']}}<br>

@component('mail::button', ['url' => url('/login')])
Return Vehicle
@endcomponent

Thanks,<br>
Vehicle Requisitions
@endcomponent
