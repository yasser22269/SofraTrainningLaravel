<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blood_Type;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Donation_Reguest;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Token;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class TokenController extends Controller
{
    public function clientRegisterToken(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'type'  => 'required|in:android,ios',
            'token' => 'required',
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0, $validation->errors()->first(), $data);
        }

        Token::where('token', $request->token)->delete();
        //    Token::create([
        //   'token' => $request->token,
        //   'type' => $request->type,
        //   'tokenable_id' => 1,//$request->user()->id,//auth()->guard('client')->id,
        //   'tokenable_type' => 'client',
        //
        // ]);

        $request->user()->tokens()->create($request->all());
        return responseJson(1, 'تم التسجيل بنجاح');
    }


    public function clientRemoveToken(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'token' => 'required',
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0, $validation->errors()->first(), $data);
        }

        Token::where('token', $request->token)->delete();
        return responseJson(1, 'تم الحذف بنجاح بنجاح');
    }


}


