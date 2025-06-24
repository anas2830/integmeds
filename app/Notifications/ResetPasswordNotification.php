<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('🔐 Reset Your Password Request')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('We received a request to reset your password.')
            ->action('Reset Password', $this->url)
            ->line('This password reset link will expire in 60 minutes.')
            ->line('If you didn’t request a password reset, you can safely ignore this email.')
            ->salutation("Best Regards,  \n" . config('app.name'));
    }
}
