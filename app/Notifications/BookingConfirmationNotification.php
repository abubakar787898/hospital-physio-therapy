<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class BookingConfirmationNotification extends Notification
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
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        // dd($this->patient);

        return (new MailMessage)
            ->subject(__( 'Gentle Reminder: Your Upcoming Appointment with '. config('app.name')))
            ->line(new HtmlString('<div style="text-align: center;"><img src="' . asset('logo.png') . '" alt="Company Logo" style="max-width:37%;"></div>'))
            ->markdown(
                'emails.user.appointment_reminder',
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
