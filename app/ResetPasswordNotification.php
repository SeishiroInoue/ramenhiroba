<?php

namespace App;

use Illuminate\Auth\Notifications\ResetPassword as ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends ResetPassword
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('パスワード再設定')
            ->line('下のボタンをクリックしてパスワードを再設定してください。')
            ->action('パスワード再設定', url('password/reset', $this->token))
            ->line('もし心当たりがない場合は、本メッセージは破棄してください。');
    }
}