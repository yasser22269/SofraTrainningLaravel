<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;

class AddressController extends Controller
{

   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $Addresses = Address::paginate(CountPaginate);
    return view("Admin.Addresses.index",compact('Addresses'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $Cities = City::all();

    return view("Admin.Addresses.create",compact('Cities'));

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(AddressRequest $request)
  {
    $requestArray = $request->all();
    Address::create($requestArray);
   $request->session()->flash('success', 'Address was successful added!');
    return redirect()->route('Admin.addresses.index');
  }

  public function edit($id)
  {
    $Addresses = Address::findOrfail($id);
    $Cities = City::all();

    return view("Admin.Addresses.edit",compact('Addresses','Cities'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(AddressRequest $request,$id)
  {
    $Address = Address::findOrfail($id);

    $requestArray = $request->all();
      $Address->update(($requestArray));
   $request->session()->flash('success', 'Address was successful Edited!');
    return redirect()->route('Admin.addresses.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $Address = Address::findOrfail($id);
    $Address->delete();
    session()->flash('success', 'Address was successful Deleted!');
    return redirect()->route('Admin.addresses.index');
  }


}

?>
