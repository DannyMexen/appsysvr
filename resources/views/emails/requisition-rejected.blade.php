@component('mail::message')
# Requisition Rejected

Hello.

Your requisition has been rejected. See the requisition details below.

Purpose: {{ $details['requisition']['purpose']}}<br>
Start Date: {{ date('l jS F Y', (strtotime($details['requisition']['start_date']))) }}<br>
Return Date: {{ date('l jS F Y', (strtotime($details['requisition']['return_date']))) }}<br>
First-line Approval: {{ $details['officer']['first_name']}} {{ $details['officer']['last_name']}}<br>
Managerial Approval: {{ $details['manager']['first_name']}} {{ $details['manager']['last_name']}}<br>

Please get in touch with the Vehicle Requisitions Team for further enquiries.

@component('mail::button', ['url' => url('/login')])
New Requisition
@endcomponent

Thanks,<br>
Vehicle Requisitions
@endcomponent

