<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Consultation;

class TuvanReplyNotification extends Notification
{
    protected $consultation;

    public function __construct(Consultation $consultation)
    {
        $this->consultation = $consultation;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Phản hồi tư vấn từ Tư vấn tâm lý Đại học Thủy Lợi')
            ->greeting('Chào bạn,')
            ->line('Bạn đã nhận được phản hồi cho yêu cầu tư vấn của mình.')
            ->line('Nội dung phản hồi:')
            ->line($this->consultation->reply)
            ->line('Cảm ơn bạn đã liên hệ với chúng tôi.');
    }
}
