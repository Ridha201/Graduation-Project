<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\order;
use Illuminate\Support\Facades\Auth;

class OrderConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $confirmationLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($confirmationLink)
    {
        $this->confirmationLink = $confirmationLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
           $orders = order::where('userID', Auth::user()-> id)->get();
           
        return $this->view('orderconfirmation', ['orders' => $orders])
                    ->with([
                        'confirmationLink' => $this->confirmationLink,
                    ]);
    }
}