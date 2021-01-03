<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blood_Type;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Governorate;
use App\Models\Restaurant;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class MainRestaurantsController extends Controller
{

    public function getprofileRestaurants(Request $request )
    {
    $Restaurant = Restaurant::with('address')->where('api_token', $request->api_token)->get();
    return responsejson(1,'loading....', $Restaurant);


    }
  public function UpdateprofileRestaurants(Request $request)
  {
    $valdetor = validator()->make($request->all(),[
        'phone'=>"required",
      // 'password'=>'confirmed',
        'email'=>'required|email|unique:restaurants,email,'.$request->user()->id,
        'delivery_cost'=>"required",
        'category_id'=>"required",
        'whats_app'=>"required",
        'min_order'=>"required",
        'address_id'=>"required",
         'name'=>"required",
         'state'=>"required",
    ]);
        if($valdetor->fails()){
            return responsejson(0,$valdetor->errors()->first(),$valdetor->errors());
        }
    	if($request->input('password') && $request->password != '' )
        {
        $request->merge(['password' => bcrypt($request->password)]);
        }

       $Restaurant= Restaurant::where('id',$request->user()->id)->update($request->all());

        return responsejson(1,"تم التسجيل بنجاح",
        [
            "api_token" => $request->user()->api_token,
            "Restaurant" => $request->user(),

        ]);

  }




}

?>
