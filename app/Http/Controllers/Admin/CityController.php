<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\cityRequest;
use App\Models\city;
use App\Models\Governorate;

class CityController extends Controller
{

   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $cities = city::paginate(CountPaginate);
    return view("Admin.cities.index",compact('cities'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view("Admin.cities.create");

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(cityRequest $request)
  {
    $requestArray = $request->all();
    city::create($requestArray);
   $request->session()->flash('success', 'city was successful added!');
    return redirect()->route('Admin.cities.index');
  }

  public function edit($id)
  {
    $cities = city::findOrfail($id);

    return view("Admin.cities.edit",compact('cities'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(cityRequest $request,$id)
  {
    $city = city::findOrfail($id);

    $requestArray = $request->all();
      $city->update(($requestArray));
   $request->session()->flash('success', 'city was successful Edited!');
    return redirect()->route('Admin.cities.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $city = city::findOrfail($id);
    $city->delete();
    session()->flash('success', 'city was successful Deleted!');
    return redirect()->route('Admin.cities.index');
  }

}

?>
