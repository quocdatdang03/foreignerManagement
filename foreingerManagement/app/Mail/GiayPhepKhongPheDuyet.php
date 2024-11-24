<?php

namespace App\Mail;

use App\Models\GiayPhep;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GiayPhepKhongPheDuyet extends Mailable
{
    use Queueable, SerializesModels;

      public $giayPhep;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(GiayPhep $giayPhep)
    {
        $this->giayPhep = $giayPhep;
    }


    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Giấy phép tạm trú của bạn không được phê duyệt',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
         return new Content(
            view: 'emails.giayphep_khongpheduyet',
        );
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
