<?php

namespace Modules\Course\App\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnrollmentPaymentApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $mail_subject;
    public $mail_message;

    public function __construct($mail_message, $mail_subject)
    {
        $this->mail_subject = $mail_subject;
        $this->mail_message = $mail_message;
    }

    /**
     * Build the message.
     */
    public function build(): self
    {
        return $this->subject($this->mail_subject)->view('course::admin.enrollment.enrollment_payment_mail', [
            'mail_message' => $this->mail_message
        ]);
    }
}
