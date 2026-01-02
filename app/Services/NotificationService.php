<?php

namespace App\Services;

class NotificationService
{
    public static function created(?string $message = null)
    {
        notyf()->success($message ?? 'Created Successfully.');
    }

    public static function updated(?string $message = null)
    {
        notyf()->success($message ?? 'Updated Successfully.');
    }
}
