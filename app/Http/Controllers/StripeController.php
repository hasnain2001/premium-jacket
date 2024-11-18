<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;
use App\Models\Order;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
{
    $order = Order::where('order_number', $request->order_number)->firstOrFail();

    // Set Stripe API key
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    try {
        $charge = \Stripe\Charge::create([
            "amount" => $order->total_amount * 100, // Convert amount to cents
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Order #" . $order->order_number,
        ]);

        // If payment is successful, update order status
        if ($charge->status === 'succeeded') {
            $order->update(['status' => 'completed']);

            // Send order confirmation email
            Mail::to($order->email)->send(new OrderConfirmation($order, $order->items));

            // Clear cart and flash success message
            $this->clearCart($request);
            Session::flash('success', 'Payment successful!');
            return redirect()->route('checkout.success', ['order_number' => $order->order_number]);
        } else {
            throw new \Exception('Payment was not successful.');
        }

    } catch (\Exception $e) {
        Log::error('Stripe Payment Error: ' . $e->getMessage());
        return back()->withErrors(['error' => 'There was an error with your payment.']);
    }
}

}
