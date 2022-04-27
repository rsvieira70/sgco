<?php

namespace App\Notifications;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SystemErrorAlert extends Notification implements ShouldQueue
{
    use Queueable;
    private $error;
    private $exception;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($error, $exception)
    {
        $this->error = $error;
        $this->exception = $exception;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Alerta de erro no sistema SGCO')
                    ->line('Ocorreu uma falha no sistema')
                    ->line($this->error)
                    ->line($this->exception)
                    ->action('Acessar sistema', url('/'))
                    ->line('Obrigado por utilizar a aplicação!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            $this->error, $this->exception
        ];
    }

}
