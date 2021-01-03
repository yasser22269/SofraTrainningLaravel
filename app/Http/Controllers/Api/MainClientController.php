<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blood_Type;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Governorate;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class MainClientController extends Controller
{

    public function getprofileClient(Request $request )
    {
      $client = Client::with("address")->where('api_token', $request->api_token)->get();
      return responsejson(1,'loading....', $client);
    }

  public function UpdateprofileClient(Request $request)
  {
    $valdetor = validator()->make($request->all(),[
        'phone'=>"required",
        'email'=>'required|email|unique:clients,email,'.$request->user()->id,
        'address_id'=>"required",
         'name'=>"required",
    ]);
        if($valdetor->fails()){
            return responsejson(0,$valdetor->errors()->first(),$valdetor->errors());
        }
    	if($request->input('password') && $request->password != '' )
        {
        $request->merge(['password' => bcrypt($request->password)]);
        }
        // else
        // return responsejson(1,"هناك مشكلة فى الاعدادت");

        Client::where('id',$request->user()->id)->update($request->all());

        return responsejson(1,"تم التسجيل بنجاح",
        [
            "api_token" => $request->user()->api_token,
            "client" => $request->user(),

        ]);

  }




}

?>
