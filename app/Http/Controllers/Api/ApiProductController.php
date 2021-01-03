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
use App\Models\Post;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class ApiProductController extends Controller
{

   public function ProductCreate(Request $request){
    $valdetor = validator()->make($request->all(),[
        'Photo'=>"nullable",
        'title'=>'required',
        'content'=>"required",
        'price'=>"required",
        'Processing_time'=>"required",
        'price_offer'=>"required",
    ]);
        if($valdetor->fails()){
            return responsejson(0,$valdetor->errors()->first(),$valdetor->errors());
        }

        // else
        // return responsejson(1,"هناك مشكلة فى الاعدادت");
        $Product = $request->except('restaurant_id','Photo');
        $id =  $request->user()->id;
        $Product += ["restaurant_id"=> $id];
      //  return $Product;


      //start  save Photo

      $fileName = "";
      if($request->hasFile('Photo')){
          $file = $request->file('Photo');
              $fileName = time().'.'. $file->getClientOriginalExtension();
              $file->move(public_path('Photos/Product/') , $fileName);
        $Product +=  ['Photo' => $fileName];
      }else{
        $Product +=  ['Photo' => "default.png"];

      }
      //End save Photo



        $Product = Product::create($Product);


        return responsejson(1,'loading....',$Product);

   }

   public function Product($id){

    $Product = Product::find($id);
    if(!$Product)
        return responseJson(0,'not Product found');

    return responsejson(1,'loading....',$Product);

    }


    public function DeleteOffer($id){

        $Product = Product::find($id);
        if(!$Product)
            return responseJson(0,'not Product found');
            $Product->delete();
        return responsejson(1,'تم حذف المنتج');

        }

    public function Products(){

        $Products = Product::all();
        if(!$Products)
            return responseJson(0,'not Product found');

        return responsejson(1,'loading....',$Products);

        }
        public function offers(){

            $offers = Offer::all();
            if(!$offers)
                return responseJson(0,'not offer found');

            return responsejson(1,'loading....',$offers);

            }













        //start Offer

        public function OfferCreate(Request $request){
            $valdetor = validator()->make($request->all(),[
                'Photo'=>"nullable",
                'title'=>'required',
                'body'=>"required",
                'from'=>"required",
                'to'=>"required",
            ]);
                if($valdetor->fails()){
                    return responsejson(0,$valdetor->errors()->first(),$valdetor->errors());
                }

                $Offer = $request->except('restaurant_id','Photo');
                $id =  $request->user()->id;
                $Offer += ["restaurant_id"=> $id];

              //start  save Photo

              $fileName = "";
              if($request->hasFile('Photo')){
                  $file = $request->file('Photo');
                      $fileName = time().'.'. $file->getClientOriginalExtension();
                      $file->move(public_path('Photos/Offer/') , $fileName);
                $Offer +=  ['Photo' => $fileName];
              }else{
                $Offer +=  ['Photo' => "default.png"];

              }
              //End save Photo

                $Offer = Offer::create($Offer);


                return responsejson(1,'loading....',$Offer);

           }
           public function Offer($id){

            $Offer = Offer::find($id);
            if(!$Offer)
                return responseJson(0,'not Product found');

            return responsejson(1,'loading....',$Offer);

            }
            public function UpdateOffer($id, Request $request){

                $Offers = Offer::find($id);




                    $Offer = $request->except('Photo');


                  //start  save Photo

                  $fileName = "";
                  if($request->hasFile('Photo')){
                      $file = $request->file('Photo');
                          $fileName = time().'.'. $file->getClientOriginalExtension();
                          $file->move(public_path('Photos/Offer/') , $fileName);
                    $Offer +=  ['Photo' => $fileName];
                  }else{
                    $Offer +=  ['Photo' => "default.png"];

                  }
                  //End save Photo

                    $Offers->update(($Offer));


                    return responsejson(1,'loading....',$Offers);


                }
        //End Offer

}


