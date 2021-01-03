<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blood_Type;

class Blood_TypeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $Blood_Types = Blood_Type::paginate(CountPaginate);
    return view("Admin.Blood_Types.index",compact('Blood_Types'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

    return view("Admin.Blood_Types.create");

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Blood_TypeRequest $request)
  {
    $requestArray = $request->all();
    Blood_Type::create($requestArray);
   $request->session()->flash('success', 'Blood_Type was successful added!');
    return redirect()->route('Admin.Blood_Types.index');
  }

  public function edit($id)
  {
    $Blood_Types = Blood_Type::findOrfail($id);


    return view("Admin.Blood_Types.edit",compact('Blood_Types'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Blood_TypeRequest $request,$id)
  {
    $Blood_Type = Blood_Type::findOrfail($id);

    $requestArray = $request->all();
      $Blood_Type->update(($requestArray));
   $request->session()->flash('success', 'Blood_Type was successful Edited!');
    return redirect()->route('Admin.Blood_Types.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $Blood_Type = Blood_Type::findOrfail($id);
    $Blood_Type->delete();
    session()->flash('success', 'Blood_Type was successful Deleted!');
    return redirect()->route('Admin.Blood_Types.index');
  }


}
