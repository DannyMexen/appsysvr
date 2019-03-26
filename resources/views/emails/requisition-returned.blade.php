@component('mail::message')
# Vehicle Returned

Hello.

{{ $details['user']['first_name']}} {{ $details['user']['last_name']}} has returned a vehicle. See the details below.


Vehicle: {{ $details['vehicle']['make'] }} {{ $details['vehicle']['model'] }} - {{ $details['vehicle']['registration'] }}<br>
Purpose: {{ $details['requisition']['purpose']}}<br>
Start Date: {{ date('l jS F Y', (strtotime($details['requisition']['start_date']))) }}<br>
Return Date: {{ date('l jS F Y', (strtotime($details['requisition']['return_date']))) }}<br>
Managerial Approval: {{ $details['manager']['first_name']}} {{ $details['manager']['last_name']}}<br>


Thanks,<br>
Vehicle Requistions
@endcomponent
