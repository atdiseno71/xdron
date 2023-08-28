<?php

namespace App\Notifications;

use App\Models\Operacion;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OperationNotification extends Notification
{
    use Queueable;

    private $operation;

    /**
     * Create a new notification instance.
     */
    public function __construct(Operacion $operation)
    {
        $this->operation = $operation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
            'id' => $this->id,
            'id_servicio' => $this->operation?->servicio?->name,
            'descarga' => $this->operation?->descarga,
            'fecha_ejecucion' => $this->operation?->fecha_ejecucion,
            'id_piloto' => $this->operation?->user?->name,
            'observations' => $this->operation?->observations,
            'created_at' => $this->operation?->created_at,
        ];
    }
}
