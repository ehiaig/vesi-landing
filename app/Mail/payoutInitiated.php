<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Payout;

class payoutInitiated extends Mailable
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
        return $this->view('emails.payout.initiate')
                    ->subject("We have received your withdrawal request.")
                    ->with([
                        'user' => auth()->user(),
                        'payout' => $this->payout                      
                    ]);
    }
}
