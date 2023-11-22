<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactUsNotification extends Notification
{
    use Queueable;
    public $contact;
    public function __construct($contact)
    {

        $this->contact = $contact;
    }
    /**
     * Create a new notification instance.
     */
   

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Contact Us - Someone Reached Out')
        ->line('Hi Admin,')
        ->line('Someone has contacted you. Here are the details:')
        ->line('Name: ' . $this->contact['name'])
        ->line('Email: ' . $this->contact['email'])
        ->line('Details: ' . $this->contact['comment'])
        ->action('View Contact', url('/login'))
        ->line('Thank you for using our application!');
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
