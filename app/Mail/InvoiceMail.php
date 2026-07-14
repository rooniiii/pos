<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public mixed $sale;
    public mixed $pdf;

    public function __construct( mixed $sale, mixed $pdf)
    {
        $this->sale = $sale;
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->subject('Your Invoice')
            ->view('emails.invoice')
            ->attachData(
                $this->pdf->output(),
                'Invoice.pdf',
                [
                    'mime' => 'application/pdf',
                ]
            );
    }
}