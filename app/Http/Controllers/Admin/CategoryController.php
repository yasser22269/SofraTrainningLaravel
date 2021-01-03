<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['permission:read_categories'])->only('index');
    //     $this->middleware(['permission:update_categories'])->only('edit');
    //     $this->middleware(['permission:create_categories'])->only('create');
    //     $this->middleware(['permission:delete_categories'])->only('destroy');

    // }

  public function index()
  {
      $Categories = Category::paginate(CountPaginate);
    return view("Admin.Categories.index",compact('Categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

    return view("Admin.Categories.create");

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CategoryRequest $request)
  {
    $requestArray = $request->all();
    Category::create($requestArray);
   $request->session()->flash('success', 'Category was successful added!');
    return redirect()->route('Admin.categories.index');
  }

  public function edit($id)
  {
    $Categories = Category::findOrfail($id);


    return view("Admin.Categories.edit",compact('Categories'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(CategoryRequest $request,$id)
  {
    $Category = Category::findOrfail($id);

    $requestArray = $request->all();
      $Category->update(($requestArray));
   $request->session()->flash('success', 'Category was successful Edited!');
    return redirect()->route('Admin.categories.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $Category = Category::findOrfail($id);
    $Category->delete();
    session()->flash('success', 'Category was successful Deleted!');
    return redirect()->route('Admin.categories.index');
  }


}

?>
