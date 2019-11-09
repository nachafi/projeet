<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;


class CheckoutController extends Controller
{
    protected $orderRepository;
    

    public function __construct(OrderContract $orderRepository )
    {   
         
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout()
    {
        return view('site.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        // Before storing the order we should implement the
        // request validation which I leave it to you
        $validatedData = $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'address' => 'required', 
            'city' => 'required', 
            'country' => 'required', 
            'post_code' => 'required', 
            'phone_number' => 'required', 
            
        ]);
        $order = $this->orderRepository->storeOrderDetails($request->all());

        
    // You can add more control here to handle if the order
    // is not stored properly
    if($order) {
    return view('site.pages.success', compact('order'));
    }
        return redirect()->back()->with('message','Order not placed');
    }
   
}