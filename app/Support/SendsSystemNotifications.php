<?php

namespace App\Support;

use App\Models\User;
use App\Notifications\SystemActivityNotification;

trait SendsSystemNotifications
{
    protected function notifyUsers(string $title, string $message, string $level = 'info', ?string $url = null): void
    {
        User::query()->each(function (User $user) use ($title, $message, $level, $url): void {
            $user->notify(new SystemActivityNotification($title, $message, $level, $url));
        });
    }
}
