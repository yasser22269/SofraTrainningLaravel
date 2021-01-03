<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blood_Type;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Governorate;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Post;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class ApiOrderController extends Controller
{

  //////////////////////////// client order

  public function newOrder(Request $request){

    $validator = validator()->make($request->all(), [

      'restaurant_id' =>'required|exists:restaurants,id',
      'products.*.product_id' =>'required|exists:products,id',
      'products.*.quantity' =>'required',
     // 'address' =>'required',
      'payment_id' =>'required|exists:payments,id',

    ]);

    if($validator->fails())
    {
      return responseJson(0, $validator->errors()->first(), $validator->errors());
    }

    $restaurant = Restaurant::find($request->restaurant_id);

    if($restaurant->state == 'close')
    {
      return responseJson(0, 'هذا المطعم مغلق');
    }

    $order = $request->user()->orders()->create([

      'restaurant_id' => $request->restaurant_id,
      'notes' => $request->notes,
      'state' =>'pending',
      //'address' => $request->address,
      'payment_id' => $request->payment_id,

    ]);

    $cost = 0;
    $delivery_price = $restaurant->delivery_cost;

    foreach ($request->products as $p) {

      $product = Product::find($p['product_id']);
     // return $product;
      $readyProduct = [
        $p['product_id'] => [
          'quantity' => $p['quantity'],
          'price' => $product->price,
          'note' => (isset($p['note'])) ? $p['note'] : '',
        ]
      ];
      $order->products()->attach($readyProduct);
      $cost += ($product->price * $p['quantity']);

    }

    if($cost >= $restaurant->minimum_order)
    {
      $total = $cost + $delivery_price;
      $commission = Setting::first()->commission * $cost;
      $net = $total - $commission;

      $update = $order->update([
        'price' => $cost,
        'delivery_price' => $delivery_price,
        'total_price' => $total,
        'commission' => $commission,
        'net' => $net,
      ]);

    }else{
      $order->delete();
      return responseJson(0,'لايمكن أن يكون الطلب أقل من'.$restaurant->minimum_order.'جنيه');
    }
    $notification = $restaurant->notifications()->create(
      [
        'title' => 'يوجد طلب جديد',
        'body' => $request->user()->name .'لديك طلب جديد من العميل',
       'notifationable_id' => $restaurant->id,
        'notifationable_type' => 'restaurant',
      ]
    );

    $payment = Payment::where('id',$request->payment_method_id)->first();

    $order = $order->fresh()->load('products');

    if(!$order){

      return responseJson(0,'not post found');

    }else{

      return responseJson(1, 'success', $order);

    }
  }

  public function orderDetails(Request $request,$id)
  {
    $order = Order::where('id',$id)->get();
    //$order = Order::where('id',10)->first();
    if(!$order){

      return responseJson(0,'not post found');

    }else{

      return responseJson(1, 'success', $order);

    }
  }

  public function myOrders(Request $request,$client_id)
  {
    // $validator = validator()->make($request->all(),[

    //   'client_id' => 'required|exists:clients,id'

    // ]);

    // if($validator->fails()){

    //   return responseJson(0, $validator->errors()->first());

    // }

   $orders = $request->user()->orders()->where('client_id',$client_id)->get();
   // $orders = $request->user()->orders()->where('client_id',1)->first();

    if(!$orders){

      return responseJson(0,'not Oredr found');

    }else{

      return responseJson(1, 'success', $orders);

    }

  }

  public function clientconfirmOrder(Request $request,$order_id)
  {
        // $validator = validator()->make($request->all(), [

        //   'order_id' => 'required',

        // ]);

        // if($validator->fails())
        // {
        //   return responseJson(0, $validator->errors()->first(), $validator->errors());
        // }
        $order = Order::where('id',$order_id)->first();
      //  return $order;
        $order->state = 'complete';
        $order->save();
        $client = $order->client()->first();
        $restaurant = $order->restaurant()->first();
        $notification = $restaurant->notifications()->create(
            [
            'title'=>'تم استلام الطلب',
            'body'=>$client->name .'تم استلام العميل للطلب',
            'notifationable_id' => $restaurant->id,
            'notifationable_type' => 'restaurant',
            ]
        );

      return responseJson(1, 'success',[ $order,$notification]);

  }

  public function clientRejectedOrder(Request $request)
  {


    $order = Order::where('id',$request->order_id)->first();
    $order->state = 'rejected';
    $order->save();
    $restaurant = $order->restaurant()->first();
    $notification = $restaurant->notifications()->create(
      [
        'title'=>'لقد تم رفض الطلب من جانب العميل',
        'body'=>$request->user()->name .'تم رفض الطلب من عميل',
        'notifationable_id' => $restaurant->id,
        'notifationable_type' => 'restaurant',
      ]
    );

    return responseJson(1, 'success',[ $order,$notification]);

  }


  /////////////////////////////////// End client order


  ///////////////////////////////// Start restaurant order


  public function resOrder(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'state' => 'required',
      'restaurant_id' => 'required|exists:restaurants,id',

    ]);

    if($validator->fails())
    {
      return responseJson(0, $validator->errors()->first());
    }


    $restaurant = Order::where('restaurant_id',$request->restaurant_id)->first();


    if($restaurant){
        if($request->state == 'pending')
      {
        $orders = Order::where('state','pending')->get();

          return responseJson(1, 'success', $orders );
      }
      if($request->state == 'accepted')
      {
        $orders = Order::where('state','accepted')->get();

          return responseJson(1, 'success', $orders );
      }

      if($request->state == 'delivered')
      {
        $delivery = Order::where('state','delivered')->get();

          return responseJson(1, 'success', $delivery );
      }

      if($request->state == 'rejected')
      {
        $rejected = Order::where('state','rejected')->get();

          return responseJson(1, 'success', $rejected );
      }

      if($request->state == 'delivered')
      {
        $delivered = Order::where('state','delivered')->get();

          return responseJson(1, 'success', $delivered );
        }

        if($request->state == 'complete')
      {
        $complete = Order::where('state','complete')->get();

          return responseJson(1, 'success', $complete );
        }

    }else{
      return responseJson(0, 'خطأ');
    }

  }

  public function restaurantAcceptedOrder(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'order_id' => 'required|exists:orders,id',

    ]);

    if($validator->fails())
    {
      return responseJson(0, $validator->errors()->first(), $validator->errors());
    }

    $order = Order::where('id',$request->order_id)->first();
    $order->state = 'accepted';
    $order->save();
    $res = $order->client()->first();
    $notification = $res->notifications()->create(
      [
        'title'=>'تم قبول الطلب',
        'body'=>$res->name .'تم قبول الطلب من مطعم  ',
        'notifationable_id' =>  $order->client_id,
       'notifationable_type' =>  'App\Models\Client',
      ]
    );
    return responseJson(1, 'success', $order);


  }

  public function restaurantConfirmOrder(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'order_id' =>'required',

    ]);

    if($validator->fails())
    {
      return responseJson(0, $validator->errors()->first(), $validator->errors());
    }

    $order = Order::where('id',$request->order_id)->first();
    $order->state = 'delivered';
    $order->save();
    $res = $order->client()->first();
    $notification = $res->notifications()->create(
        [
          'title'=>'تم قبول الطلب',
          'body'=>$res->name .'تم قبول الطلب من مطعم  ',
          'notifationable_id' =>  $order->client_id,
          'notifationable_type' => 'App\Models\Client',
        ]
      );
    return responseJson(1, 'success', [$order,$notification] );

  }



}


