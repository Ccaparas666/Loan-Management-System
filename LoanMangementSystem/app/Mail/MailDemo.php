<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailDemo extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;
    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        //
        $this->mailData = $mailData;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'This Mail is From Lendwise Lending',
    //     );
    // }

    public function envelope(): Envelope
    {
        $loanStatus = $this->mailData['loanStatus'];
        $subject = '';

        switch ($loanStatus) {
            case 'Loan Active':
                $subject = 'Your Loan Payment Receipt';
                break;
        
            case 'Approved':
                $subject = 'Congratulations! Your Loan Application has been Approved';
                break;
        
            case 'Rejected':
                $subject = 'Important Notice Regarding Your Loan Application';
                break;
        
            case 'PAID':
                $subject = 'Successful Payment: Your Loan is Now Paid Off';
                break;
        
            case 'In Process':
                $subject = 'Your Loan Application is Under Review';
                break;

            case 'PaymentReminder':
                $subject = 'Payment Update Reminder';
                break;
            // Add more cases for other loan statuses as needed

            default:
                $subject = 'This Mail is From Lendwise Lending';
        }

        return new Envelope(subject: $subject);
    }


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.sendemail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
