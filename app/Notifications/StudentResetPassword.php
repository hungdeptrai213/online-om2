<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;

class StudentResetPassword extends ResetPassword
{
    /**
     * Get the reset URL for the given notifiable.
     */
    protected function resetUrl($notifiable)
    {
        return url(route('student.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    }
}
