<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Blood_Type;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Donation_Reguest;
use App\Models\Governorate;
use App\Models\Notification;
use App\Models\Restaurant;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class generalController  extends Controller
{


    public function address(Request $request )
    {

     $Address= Address::get();


          return responsejson(1,"loading",$Address);

    }
  public function cities(Request $request)
  {
      $cities= City::with('addresses')->get();

        return responsejson(1,"loading",$cities);

  }


  public function categories(Request $request)
  {
         $categories= Category::get();


        return responsejson(1,"loading", $categories);

  }

  public function settings()
    {
      $settings = Setting::first();


        return responsejson(1,'loading....',$settings);

    }
    public function aboat_us()
    {
      $about_app = Setting::select('about_us')->get();

        return responsejson(1,'loading...',$about_app);

    }





  public function Notification(Request $request)
  {
      $client = Client::where('api_token', $request->api_token)->first();
      $res = Restaurant::where('api_token', $request->api_token)->first();
      if($client){
         $Notification = Notification::where(
            [
                "notifationable_id"=>$client->id,
                "notifationable_type"=>"App\Models\Client"
             ])->get();
        }else{
         $Notification = Notification::where(
             [
                "notifationable_id"=>$res->id,
                "notifationable_type"=>"App\Models\Restaurant"
             ]
         )->get();
             }
        return responsejson(1,"loading", $Notification);

  }

  public function contacts(Request $request)
  {
    $valdetor = validator()->make($request->all(),[
        'name'=>"required",
        'phone'=>"required",
        'email'=>"required",
        'type_massage'=>"required",
        'message'=>"required",
        //'client_id'=> $request->user()->id,
    ]);
        if($valdetor->fails()){
            return responsejson(0,$valdetor->errors()->first(),$valdetor->errors());
        }
        //$request->user()->id
        $Contact = new Contact;

        $Contact->name = $request->name;
        $Contact->phone = $request->phone;
        $Contact->email = $request->email;
        $Contact->type_massage = $request->type_massage;
        $Contact->message = $request->message;

        $Contact->save();

        return responsejson(1,"تم الارسال بنجاح",
        [
            "api_token" => $request->user()->api_token,
            "Contact" => $Contact,
        ]);

  }
}

?>
