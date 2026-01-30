<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class PackageApprovalNotification extends Notification
{
    use Queueable;

    protected $packageData;

    // constructor to accept package data
    public function __construct($packageData)
    {
        $this->packageData = $packageData;
    }

    public function via(object $notifiable): array
    {
        // database, mail, broadcast are the channels we are using
        return ['database', 'mail', 'broadcast'];
    }

    // what will be sent in the mail
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Package Edited Notification')
            ->line('One Line Edited: ' . $this->packageData['package_name'])
            ->action('Review', url($this->packageData['action_url']))
            ->line('Thank you for editing!');
    }

    // databse and real-time notification content
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'One package has been edited.',
            'package_name' => $this->packageData['package_name'],
            'editor_name' => $this->packageData['editor_name'],
            'action_url' => $this->packageData['action_url'],
        ];
    }

    // for real-time broadcasting
    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'message' => 'New notification: One package has been edited.',
            'count' => $notifiable->unreadNotifications()->count() + 1,
        ]);
    }
}
