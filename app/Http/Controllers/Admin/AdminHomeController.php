<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Donation_Reguest;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{



    public function index()
    {
        //return auth()->user();
        $Contacts = Contact::count();
        $Product = Product::count();
        $Clients = Client::count();
        $Order = Order::count();
      return view("Admin.home",compact('Contacts','Product','Clients','Order'));
    }

    public function changePassword()
    {
        $admin =Client::where('id',Auth()->user()->id)->first();

        return view("Admin.changePassword.edit",compact('admin'));

    }

    public function changePasswordupdate(Request $request)
    {
        $User = Client::where('id',$request->id)->first();
        $requestArray = $request->all();

     if(isset($requestArray['password']) && $requestArray['password'] != ''){
        $requestArray['password'] = bcrypt($requestArray['password']);
      }else{
          unset($requestArray['password']);
      }
      $User->update(($requestArray));

      $admin =Client::where('id',Auth()->user()->id)->first();
      $request->session()->flash('success', 'admin was successful Edited!');
        return view("Admin.changePassword.edit",compact('admin'));

    }

}
