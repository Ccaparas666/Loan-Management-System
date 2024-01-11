<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CoMakerMail extends Mailable
{
    use Queueable, SerializesModels;
    public $sendCoMaker;
    /**
     * Create a new message instance.
     */
    public function __construct($sendCoMaker)
    {
        //
        $this->sendCoMaker = $sendCoMaker;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $Mailtype = $this->sendCoMaker['emailType'];
        // return new Envelope(
        //     subject: 'Co Maker Mail',
        // );
        $subject = '';

        switch ($Mailtype) {
            case 'LoanApply':
                $subject = 'You Have Been Added as a Co-Maker';
                break;

            case 'LoanUpdate':
                $subject = 'Loan Update Reminder: Borrower Payment Due';
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
            view: 'emails.comaker',
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
