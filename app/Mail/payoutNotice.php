<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Payout;

class payoutNotice extends Mailable
{
    use Queueable, SerializesModels;
    protected $payout;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Payout $payout)
    {
        $this->payout = $payout;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.payout.notice')
                    ->subject("A user has requested withdrawal.")
                    ->with([
                        'user' => auth()->user(),
                        'payout' => $this->payout                      
                    ]);
    }
}
