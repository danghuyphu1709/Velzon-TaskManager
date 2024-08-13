<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class SystemNotification extends Notification
{
    use Queueable;

    protected  $task;

    public function __construct($task)
    {
        $this->task = $task;

    }
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'sắp đến hạn kết thúc hãy sớm hoàn thành nhiệm vụ của mình nhé !',
            'type' => 'Thông báo nhiệm vụ!',
            'task_name' => $this->task->task_name,
            'code' =>  $this->task->code,
        ];
    }
}
