

@component('mail::message')

Hi Admin,

A new appointment has been scheduled. Here are the details:

**Patient Details:**
- **Name:** {{$patient->f_name.' '.$patient->l_name}}
- **Email:** {{$patient->email}}
- **Contact Number:** {{$patient->mobile}}

**Appointment Details:**
- **Payment Type:** {{$patient?->payment_type=='cos'?"Cash On Service(COS)":"Online"}}
- **Appointment Type:** {{$patient?->appointment_type?->name}}
- **Service :** {{$patient?->service?->name}}
- **Date:** {{ \Carbon\Carbon::parse($patient->booking_date)->format('l, F j, Y') }}
- **Time:** {{ \Carbon\Carbon::parse($patient->booking_time)->format('h:i A') }}
- **Duration:** {{$patient->duration->duration}} Minutes
- **Amount:** €{{$patient->duration->amount}}

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
