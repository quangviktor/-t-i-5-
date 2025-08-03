<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Appointment;

class AppointmentReminder extends Notification
{
    use Queueable;

    protected $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // nếu bạn muốn lưu DB thông báo
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Bạn có lịch hẹn mới')
            ->line('Bạn đã đặt lịch hẹn thành công.')
            ->line('Thời gian: ' . Carbon::parse($this->appointment->scheduled_at)->format('H:i d/m/Y'))
            ->action('Xem chi tiết', url('/appointments'))
            ->line('Cảm ơn bạn đã sử dụng dịch vụ!');
    }

    public function toArray($notifiable)
    {
        return [
           'message' => 'Bạn có lịch hẹn mới vào ' . Carbon::parse($this->appointment->scheduled_at)->format('H:i d/m/Y'),

        ];
    }
}
