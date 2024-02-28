<?php

namespace App\Notifications;

use App\Models\Operation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OperationNotification extends Notification
{
    use Queueable;

    private $operation;
    private $is_admin;

    /**
     * Create a new notification instance.
     */
    public function __construct(Operation $operation, $is_admin)
    {
        $this->operation = $operation;
        $this->is_admin = $is_admin;
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
            'observations' => $this->operation?->observation_admin,
            'observation_admin' => $this->operation?->observation_admin,
            'assistant_id_one' => $this->operation?->assistant_one?->name . ' ' . $this->operation?->assistant_one?->lastname,
            'assistant_id_two' => $this->operation?->fecha_ejecucion,
            'pilot_id' => $this->operation?->userPilot?->name,
            'id_cliente' => $this->operation?->client?->social_reason,
            'admin_by' => $this->operation?->userAdmin?->name,
            'status_id' => $this->operation?->status?->name,
            'file_evidence' => $this->operation?->file_evidence,
            'created_at' => $this->operation?->created_at?->format('d/m/Y'),
            'is_admin' => $this->is_admin,
        ];
    }
}
