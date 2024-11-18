<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $items;

    /**
     * Create a new message instance.
     */
    public function __construct($order, $items)
    {
        $this->order = $order;
        $this->items = $items;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // Set the initial email object
        $email = $this->from('hasnainalikhan2001@gmail.com')
                      ->to($this->order->email) // Send to the customer's email
                      ->cc('hasnainalikhan2001@gmail.com') // Send a copy to the additional email
    
                      // Set the subject based on the recipient
                      ->subject($this->order->email == 'hasnainalikhan2001@gmail.com'
                                ? 'New Order Received - ' . $this->order->order_number
                                : 'Order Confirmation - ' . $this->order->order_number)
    
                      ->view('emails.order_confirmation')
                      ->with([
                          'order' => $this->order,
                          'items' => $this->items,
                      ]);
    
        // Attach product images to the email and embed them inline
        foreach ($this->items as $item) {
            $product = \App\Models\Product::find($item['product_id']);
    
            if ($product && $product->image_path) { // Check if the product has an image
                $imagePath = storage_path('app/public/uploads/product/' . $product->image_path); // Image path
    
                if (file_exists($imagePath)) {
                    // Attach the image inline using CID
                    $cid = 'product_' . $product->id; // Unique identifier for each product image
                    $email->attach($imagePath, [
                        'as' => $product->name . '.jpg', // Optional: name the attachment
                        'mime' => 'image/jpeg', // MIME type for images
                        'cid' => $cid, // Use the CID to reference the image in the email body
                    ]);
                }
            }
        }
    
        return $email;
    }
    
    
    
}
