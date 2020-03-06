<?php

namespace App\Jobs;

use App\Job;
use App\Mail\NewJobPosted;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ProcessNewJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $job_to_process;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Job $job_to_process)
    {
        //
        $this->job_to_process = $job_to_process;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        /**
         * Let's email all available technicans about this new job
         */
        $technicians = User::where('account_type', 'technician')->get();
        foreach ($technicians as $user) {
            if ($user->technician->available) {
                Mail::to($user)
                    ->queue(new NewJobPosted($this->job_to_process));
            }
        }
    }
}
