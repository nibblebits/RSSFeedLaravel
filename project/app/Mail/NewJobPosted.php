<?php

namespace App\Mail;

use App\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewJobPosted extends Mailable
{
    use Queueable, SerializesModels;

    public $job_to_mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Job $job_to_mail)
    {
        $this->job_to_mail = $job_to_mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.technician.jobs.new_job_posted')->with(['job' => $this->job_to_mail])
        ->subject('A New Job Has Been Posted!');
    }
}
