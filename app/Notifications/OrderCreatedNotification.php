<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class FormCreatedNotification extends Notification
{
    use Queueable;

    protected $data;

    /**
     * Create a new notification instance.
     */
    public function __construct( $data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [ TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        try {
            $chatId = env('TELEGRAM_CHAT_ID');
            $url = url('/form/datas/' . $this->data->id . '/edit');

            return TelegramMessage::create()
                ->to($chatId)
                ->content("You have a new data\n" . $this->data['first_name'] . ' ' . $this->data['last_name'] . " View data New \n")
                ->line($url);
        } catch (\Exception $e) {
            Log::error('Telegram Notification Error: ' . $e->getMessage());
            return null;
        }
    }

}
