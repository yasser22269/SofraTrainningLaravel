<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Hamcrest\Core\Set;

class SettingController extends Controller
{



  public function index()
  {
    $setting = Setting::first();
   // return $setting;
    return view("Admin.setting.edit",compact('setting'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,$id)
  {
    $Setting = Setting::findOrfail($id);

    $requestArray = $request->all();
      $Setting->update(($requestArray));
     $request->session()->flash('success', 'Setting was successful Edited!');
    return redirect()->back();
  }


}

?>
