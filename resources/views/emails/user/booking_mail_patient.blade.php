@component('mail::message')
<div style="text-align: center;">
    <img src="{{ asset('logo.png') }}" alt="Company Logo" style="max-width: 37%; margin-bottom: 20px;">
</div>

# Thank You for Scheduling an Appointment :-)

Hi {{ $patient->f_name.' '.$patient->l_name }},

Thank you for scheduling an appointment with us. Your appointment details are as follows:

Your appointment is scheduled for {{ \Carbon\Carbon::parse($patient->booking_date)->format('l, F j, Y') }} 

**Appointment Details:**
- **Payment Type:** {{$patient?->payment_type=='cos'?"Cash On Service(COS)":"Online"}}
- **Appointment Type:** {{$patient?->appointment_type?->name}}
- **Service :** {{$patient?->service?->name}}
- **Date:** {{ \Carbon\Carbon::parse($patient->booking_date)->format('l, F j, Y') }}
- **Time:** {{ \Carbon\Carbon::parse($patient->booking_time)->format('h:i A') }}
- **Duration:** {{$patient->duration->duration}} Minutes
- **Amount:** €{{$patient->duration->amount}}

## Other Details :
---

We look forward to seeing you!

@if(env('MOBILE_NUMBER'))
**Need to reschedule or have questions?**
Call us at: +353 {{ env('MOBILE_NUMBER') }}
@endif

---

**Important Notes:**
* Please arrive on time for your appointment.
* If you need to reschedule, please contact us in advance.
* This email serves as a confirmation of your scheduled appointment.

@endcomponent
