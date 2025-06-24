<?php
namespace App\Jobs;

use App\Mail\ContactMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;

class SendContactEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $admin_email;

    public function __construct(array $data, string $admin_email)
    {
        $this->data = $data;
        $this->admin_email = $admin_email;
    }

    public function handle()
    {
        Mail::to($this->admin_email)->send(new ContactMail($this->data));
    }
}
