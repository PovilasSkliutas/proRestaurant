<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $order; // užsakymo informacija

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $orders)
    {
        $this->order = $orders;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->order->user->name . ': Order #' . $this->order->id)
        ->view('order.shipped');
    }
}
