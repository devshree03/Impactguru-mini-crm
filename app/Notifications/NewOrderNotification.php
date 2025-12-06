<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    public function __construct(public Order $order)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail']; // email notification
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Order Created: ' . $this->order->order_number)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('A new order has been created for customer: ' . ($this->order->customer->name ?? 'N/A') . '.')
            ->line('Amount: ' . $this->order->amount)
            ->line('Status: ' . $this->order->status)
            ->line('Order Date: ' . $this->order->order_date)
            ->action('View Orders', url('/orders'))
            ->line('Thank you!');
    }
}
