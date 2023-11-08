<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\MessageAnwserEmail;
use App\Mail\WelcomeSubEmail;
use Exception;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $details;
    public $type;
    public function __construct($details, $type)
    {
        $this->type = $type;
        $this->details = $details;
    }

    public function handle(): void
    {
        if ($this->type == "subsecribeEmail") {
            $email = new WelcomeSubEmail($this->details);
            Mail::to($this->details['email'])->send($email);
        } elseif ($this->type == "emailAnswer") {
            $email = new MessageAnwserEmail($this->details);
            Mail::to($this->details['email'])->send($email);
        }
    }
}
