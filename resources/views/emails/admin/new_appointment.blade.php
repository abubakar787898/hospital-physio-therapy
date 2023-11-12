

@component('mail::message')

Hi Admin,

A new appointment has been scheduled. Here are the details:

**Patient Details:**
- **Name:** {{$patient->f_name.' '.$patient->l_name}}
- **Email:** {{$patient->email}}
- **Contact Number:** {{$patient->mobile}}

**Appointment Details:**
- **Appointment Type:** {{$patient?->slot?->appointment_type?->name}}
- **Date:** {{ \Carbon\Carbon::parse($patient->slot->date)->format('l, F j, Y') }}
- **Time:** from {{ \Carbon\Carbon::parse($patient->slot->from_time)->format('h:i A') }} to {{ \Carbon\Carbon::parse($patient->slot->to_time)->format('h:i A') }}
- **Amount:** €{{$patient->slot->price}}

**Important Notes:**
- Please ensure the patient is welcomed and guided for their appointment.
- If there are any changes or if the patient needs to reschedule, kindly assist them accordingly.

**Contact Information:**
- For any inquiries or assistance, please contact the patient at {{$patient->mobile}}.

We appreciate your dedication to providing excellent healthcare service at {{env('APP_NAME')}}.

Thank you for your attention to this matter.

Best Regards,  
The {{env('APP_NAME')}} Admin Team


@endcomponent
