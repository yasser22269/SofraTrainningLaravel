<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Notification;

class OrderController extends Controller
{


  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $orders = Order::where('restaurant_id',auth('res')->user()->id)->whereIn('state',['pending','accepted','delivered'])->paginate(CountPaginate);

    return view("Admin.orders.index",compact('orders'));
  }



  public function show($id)
  {
    $order = Order::findOrfail($id);

    return view("Admin.orders.show",compact('order'));
  }

  public function Orderaccepted($id)
  {
    $Order = Order::findOrfail($id);

    $Order->state = "accepted";
    $Order->save();
    session()->flash('success', 'Order was successful accepted!');
    return back();
  }
  public function delivered($id)
  {
    $Order = Order::findOrfail($id);

    $Order->state = "delivered";
    $Order->save();
    session()->flash('success', 'Order was successful delivered!');
    return back();
  }

}

?>

