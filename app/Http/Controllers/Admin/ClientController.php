<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Blood_Type;
use App\Models\City;
use App\Models\Client;

class ClientController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(['role:super_admin']);
    // }

  public function index()
  {
      $clients = Client::paginate(CountPaginate);
    return view("Admin.users.index",compact('clients'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $blood_types = Blood_Type::get();
    $cities = City::with('governorate')->get();
    return view("Admin.users.create",compact('blood_types','cities'));

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(UserRequest $request)
  {
    $requestArray = $request->all();
    $requestArray['password'] = bcrypt($requestArray['password']);
    $client =  Client::create($requestArray);
    $client->syncRoles($request->roles);
    $client->syncPermissions($request->permissions);

   $request->session()->flash('success', 'User was successful added!');
    return redirect()->route('Admin.users.index');
  }

  public function edit($id)
  {
    $client = Client::findOrfail($id);

  //   dd($client->hasRole('admin'));


    $blood_types = Blood_Type::get();
    $cities = City::with('governorate')->get();
    return view("Admin.users.edit",compact('client','blood_types','cities'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(UserRequest $request,$id)
  {
    $client = Client::findOrfail($id);

    $requestArray = $request->all();
    if(isset($requestArray['password']) && $requestArray['password'] != ''){
        $requestArray['password'] = bcrypt($requestArray['password']);
      }else{
          unset($requestArray['password']);
      }
  //  dd($requestArray);

      $client->update(($requestArray));

      $client->syncRoles($request->roles);
      $client->syncPermissions($request->permissions);

   $request->session()->flash('success', 'User was successful Edited!');
    return redirect()->route('Admin.users.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $client = Client::findOrfail($id);
    $client->delete();
    session()->flash('success', 'User was successful Deleted!');
    return redirect()->route('Admin.users.index');
  }

}

?>
