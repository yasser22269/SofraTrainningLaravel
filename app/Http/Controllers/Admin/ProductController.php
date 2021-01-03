<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['permission:read_Products'])->only('index');
    //     $this->middleware(['permission:update_Products'])->only('edit');
    //     $this->middleware(['permission:create_Products'])->only('create');
    //     $this->middleware(['permission:delete_Products'])->only('destroy');

    // }
  public function index()
  {
      $Products = Product::paginate(CountPaginate);

    return view("Admin.Products.index",compact('Products'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

    $restaurants = Restaurant::all();
    return view("Admin.Products.create",compact('restaurants'));

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ProductRequest $request)
  {
    $requestArray =  $request->except('Photo');

    $fileName = "";
    if($request->hasFile('Photo')){
        $file = $request->file('Photo');
            $fileName = time().'.'. $file->getClientOriginalExtension();
            $file->move(public_path('Photos/Products/') , $fileName);
      $requestArray +=  ['Photo' => $fileName];
    }else{
      $requestArray +=  ['Photo' => "default.png"];

    }
    //  dd($requestArray);
   Product::create($requestArray);

   $request->session()->flash('success', 'Product was successful added!');
   return redirect()->route('Admin.Products.index');
  }

  public function edit($id)
  {
    $Product = Product::findOrfail($id);
    $restaurants = Restaurant::all();

    return view("Admin.Products.edit",compact('Product','restaurants'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(ProductRequest $request,$id)
  {
    $Product = Product::findOrfail($id);

    $requestArray =  $request->except('Photo');
  //  dd($requestArray);

    $fileName = "";
    if($request->Photo && $request->Photo !=''){
        $file = $request->file('Photo');
            $fileName = time().'.'. $file->getClientOriginalExtension();
            $file->move(public_path('Photos/Products/') , $fileName);
      $requestArray +=  ['Photo' => $fileName];

      $Photo_path = public_path('Photos/Products/') . $Product->Photo;
      if( $Photo_path !=  public_path('Photos/Products/') ."default.png")
          File::delete($Photo_path);
    }
  //  dd($requestArray);

      $Product->update(($requestArray));
   $request->session()->flash('success', 'Product was successful Edited!');
    return redirect()->route('Admin.Products.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $Product = Product::findOrfail($id);
    $Photo_path = public_path('Photos/Products/') . $Product->Photo;
    if( $Photo_path !=  public_path('Photos/Products/') ."default.png")
        File::delete($Photo_path);


    $Product->delete();
    session()->flash('success', 'Product was successful Deleted!');
    return redirect()->route('Admin.Products.index');
  }

}

?>
