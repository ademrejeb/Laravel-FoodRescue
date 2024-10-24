<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class DemandeMatched extends Notification
{
    use Queueable;

    public $demande;

    public function __construct($demande)
    {
        $this->demande = $demande;
    }

    public function via($notifiable)
    {
        return ['mail']; // ou 'database' pour les notifications en base de données
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Une correspondance a été trouvée pour votre demande.')
                    ->action('Voir les correspondances', url('/demandes/'.$this->demande->id.'/match'))
                    ->line('Merci d’utiliser notre plateforme.');
    }
}
