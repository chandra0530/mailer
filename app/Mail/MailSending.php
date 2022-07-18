<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSending extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $to;
    public $attachments;
    public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$to,$attachments,$body)
    {
        $this->subject = $subject;
        $this->to = $to;
        $this->attachments = $attachments;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->to("subhankar0810@gmail.com","Subhankar Dutta")->view('mail.create',['body'=>$this->body]);

            // foreach($this->attachments as $attachment){
            //     $this->attach($attachment);
            // }

            // return $this;
    }
}