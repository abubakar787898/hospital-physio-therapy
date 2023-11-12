

@component('mail::message')
Hi {{$patient->f_name.' '.$patient->l_name}},

We hope this message finds you well. As your trusted healthcare provider, we would like to remind you of your upcoming appointment with us. Your commitment to your health is commendable, and we are here to ensure a smooth and comfortable experience for you.

**Appointment Details:**
- **Appointment Type:** {{$patient?->slot?->appointment_type?->name}}
- **Date:** {{ \Carbon\Carbon::parse($patient->slot->date)->format('l, F j, Y') }}
- **Time:** from {{ \Carbon\Carbon::parse($patient->slot->from_time)->format('h:i A') }} to {{ \Carbon\Carbon::parse($patient->slot->to_time)->format('h:i A') }}
- **Amount:** €{{$patient->slot->price}}


**Important Notes:**
- Please arrive on time for your appointment to ensure you receive the full benefit of your scheduled time with our healthcare professionals.
- If there are any changes in your availability or if you need to reschedule, kindly inform us in advance.

**Contact Information:**
- For general inquiries or rescheduling, reach out to us at +353 {{env('MOBILE_NUMBER')}}.

We appreciate your trust in {{env('APP_NAME')}} for your healthcare needs. Looking forward to providing you with the best care possible.

Thank you, and see you soon!

Best Regards,  
The {{env('APP_NAME')}} Team
@endcomponent
