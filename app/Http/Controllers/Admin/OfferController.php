<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Notification;

class OfferController extends Controller
{


  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $donations = Order::paginate(CountPaginate);

    return view("Admin.donations.index",compact('donations'));
  }



  public function show($id)
  {
    $donation = Order::findOrfail($id);

    return view("Admin.donations.show",compact('donation'));
  }

//   public function destroy($id)
//   {
//     $donation = Order::findOrfail($id);
//  //  $notifications = Notification::where('Order_id', $id)->get();
//   //  $notifications->delete();
//    // $donation->notifications->delete();
//     $donation->delete();

//     session()->flash('success', 'donation was successful Deleted!');
//     return back();
//   }

}

?>

