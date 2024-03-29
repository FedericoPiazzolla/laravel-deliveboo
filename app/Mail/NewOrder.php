<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public $total;
    public $recipient;
    public function __construct($_order, $_total,  $_recipient)
    {
        $this->order = $_order;
        $this->total = $_total;
        $this->recipient = $_recipient;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Conferma nuovo ordine',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        if ($this->recipient === 'customer'){
            return new Content(
                view: 'admin.emails.order-confirmation',
                with: ['order' => $this->order, 'total' => $this->total],
            );
        }elseif ($this->recipient === 'restaurant'){
            return new Content(
                view: 'admin.emails.new-order',
                with: ['order' => $this->order, 'total' => $this->total],
            );
        }
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
