<?php

namespace App\Http\Controllers\Backend\Client\standard;

use App\Models\Order\Order;
use Cart;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('client', 'courses')->get();
            return response()-> json([
            'orders' =>$orders,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'transaction_code'  =>'required',
            'image'  =>'required',

          ]);
                $image = $request->image;
                     //processing passport name
                     $strpos = strpos($image, ';'); //positionof image name semicolon
                     $sub = substr($image, 0, $strpos);
                     $ex = explode('/', $sub)[1];
                     $name = time().".".$ex;

                     $Path = public_path()."/assets/organisation/img/clients/transactions";
                         $img = Image::make($image);
                         $img ->save($Path.'/'.$name);
                     //end processing
                $transaction_image= $name;

                $user =Auth::user();
                $client = $user->client()->first();
                $Total = Cart::getTotal();


                $order = new Order();
                $order->client_id          = $client->id;
                $order->total              = (float) str_replace(',', '', $Total);
                $order->payment_method     = 'Mpesa';
                $order->transaction_code   = $request->transaction_code;
                $order->transaction_image  = $transaction_image;
                $order->save();

                if($order){
                    $cartItems = Cart::getContent();
                    if($cartItems){
                        foreach ($cartItems as $cartItem){
                            $order->courses()->attach($cartItem->id,[
                                 'payment_confirmation'=>false,
                                 'name'        => $cartItem->name,
                                 'courseType'  => $cartItem->attributes->courseType,
                                 'skill'       => $cartItem->attributes->skill,
                                 'image'       => $cartItem->attributes->image,
                                 'qty'         => $cartItem->quantity,
                                 'fee'         => $cartItem->price
                             ]);
                         }
                         Cart::clear();
                    }
                }

    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
