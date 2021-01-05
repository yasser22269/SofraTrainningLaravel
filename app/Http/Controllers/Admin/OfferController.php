<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\Notification;
use Carbon\Carbon;

class OfferController extends Controller
{


  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $offers = Offer::where('restaurant_id',auth('res')->user()->id)->paginate(CountPaginate);
      return view("Admin.offer.index",compact('offers'));
  }

  public function create()
  {
    return view("Admin.offer.create");
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(OfferRequest $request)
  {
    $requestArray =  $request->except('Photo','from','to');
   // dd($requestArray);

    $fileName = "";
    if($request->hasFile('Photo')){
        $file = $request->file('Photo');
            $fileName = time().'.'. $file->getClientOriginalExtension();
            $file->move(public_path('Photos/Offer/') , $fileName);
      $requestArray +=  ['Photo' => $fileName];
    }else{
      $requestArray +=  ['Photo' => "defualt.png"];

    }
    $from =  Carbon::parse($request->from);
    $requestArray +=  ['from' => $from ];
    $to =  Carbon::parse($request->to);
    $requestArray +=  ['to' => $to ];

  //   return $requestArray;
   //  dd($requestArray);
    Offer::create($requestArray);

   $request->session()->flash('success', 'Offer was successful added!');
   return redirect()->route('Admin.offers.index');
  }

//   public function show($id)
//   {
//     $offer = Offer::findOrfail($id);

//     return view("Admin.offer.show",compact('offer'));
//   }

  public function destroy($id)
  {
    $offer = offer::findOrfail($id);
    $offer->delete();
    session()->flash('success', 'offer was successful Deleted!');
    return back();
  }

}

?>

