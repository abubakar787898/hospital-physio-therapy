<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAppointmentNotification extends Notification
{
    use Queueable;
    public $patient;

    /**
     * Create a new notification instance.
     */
    public function __construct($patient)
    {

        $this->patient = $patient;
    }

   

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via( $notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail( $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject(__('New Appointment Scheduled - Patient: :patientName', ['patientName' => $this->patient->f_name . ' ' . $this->patient->l_name]))
            ->markdown(
                'emails.admin.new_appointment',
                [
                    'patient' => $this->patient,
                
                ]
            );
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
