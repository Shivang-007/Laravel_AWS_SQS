<?php

namespace App\Jobs;

use App\Mail\TestMail;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class SendMailJob implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;
    protected $email;
    protected $content;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $content)
    {
        $this->email = $email;
        $this->content = $content;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {   
        Mail::to($this->email)->send(new TestMail($this->content));
    }

    public function failed(Exception $exception)
    {
        Log::error('Job failed: ' . $exception->getMessage());
    }
}
