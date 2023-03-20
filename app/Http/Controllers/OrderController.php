<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Http\Requests\OrderStoreRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(Request $request) {
        $orders = new Order();
        if($request->start_date) {
            $orders = $orders->where('created_at', '>=', $request->start_date);
        }
         if($request->end_date) {
            $orders = $orders->where('created_at', '<=', $request->end_date . ' 23:59:59');
        }

        
        
        $orders = $orders->with(['items', 'transactions', 'customer'])->orderBy("id", "desc")->latest()->paginate(9);
        $orders = $orders->appends($request->all());


        $total = $orders->map(function($i) {
            return $i->total();
        })->sum();
        $receivedAmount = $orders->map(function($i) {
            return $i->receivedAmount();
        })->sum();

        return view('order.index', compact('orders', 'total', 'receivedAmount'));
    }



    public function store(OrderStoreRequest $request)
    {
        $details="";
        $counter=1;
        $cart = $request->user()->cart()->get();
        foreach ($cart as $item) {
            
            
            
            $details .= strval($counter) . ") ". $item->name . ' x ' . strval($item->pivot->quantity) ."\r\n" ;   
            $counter += 1;

            
           } 

           
        

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'user_id' => $request->user()->id,
            'Details' => $details,
        ]);

        $cart = $request->user()->cart()->get();
        foreach ($cart as $item) {
            $order->items()->create([
                'price' => $item->price * $item->pivot->quantity,
                'quantity' => $item->pivot->quantity,
                'product_id' => $item->id,
                
            ]);
            if ($item->type == "Product"){
                $item->quantity = $item->quantity - $item->pivot->quantity;
                $item->save();
            }
            
        }
        $request->user()->cart()->detach();
        $order->transactions()->create([
            'amount' => $request->amount,
            'user_id' => $request->user()->id,
        ]);
        return 'success';
    }
}
