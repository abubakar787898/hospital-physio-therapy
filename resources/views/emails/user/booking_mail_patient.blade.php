@component('mail::message')
<div style="text-align: center;">
    <img src="{{ asset('logo.png') }}" alt="Company Logo" style="max-width: 37%; margin-bottom: 20px;">
</div>

# Thank You for Scheduling an Appointment :-)

Hi {{ $patient->f_name.' '.$patient->l_name }},

Thank you for scheduling an appointment with us. Your appointment details are as follows:

Your appointment is scheduled for {{ \Carbon\Carbon::parse($patient->slot->date)->format('l, F j, Y') }} 

**Appointment Details:**
- **Appointment Type:** {{$patient?->slot?->appointment_type?->name}}
- **Date:** {{ \Carbon\Carbon::parse($patient->slot->date)->format('l, F j, Y') }}
- **Time:** from {{ \Carbon\Carbon::parse($patient->slot->from_time)->format('h:i A') }} to {{ \Carbon\Carbon::parse($patient->slot->to_time)->format('h:i A') }}
- **Amount:** €{{$patient->slot->price}}

## Details of Your Appointment:

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
