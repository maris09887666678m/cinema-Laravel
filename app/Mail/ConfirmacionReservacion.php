<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Reservacion;

//class ConfirmacionReservacion extends Mailable
//{
   // use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
   // public function __construct()
   // {
        //
   // }

    /**
     * Get the message envelope.
     */
   /* public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmacion Reservacion',
        );
    }

    /**
     * Get the message content definition.
     */
  /*  public function content(): Content
    {
        return new Content(
            markdown: 'emails/reservaciones/confirmacion',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
  /*  public function attachments(): array
    {
        return [];
    }
}*/
class ConfirmacionReservacion extends Mailable
{
    use Queueable, SerializesModels;

    public $reservacion;

    public function __construct(Reservacion $reservacion)
    {
        $this->reservacion = $reservacion;
    }

    public function build()
    {
        return $this->subject('Confirmación de Reservación')
                    ->markdown('emails.reservaciones.confirmacion');
    }
}

