<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\contactRequest;

class ContactController extends Controller
{


  public function index()
  {
      $contacts = Contact::paginate(CountPaginate);
   //   return $contacts;
    return view("Admin.contacts.index",compact('contacts'));
  }

  public function show($id)
  {
    $contacts = Contact::findOrfail($id);


    return view("Admin.contacts.show",compact('contacts'));
  }


  public function destroy($id)
  {
    $contact = Contact::findOrfail($id);
    $contact->delete();
    session()->flash('success', 'contact was successful Deleted!');
    return redirect()->route('Admin.contacts.index');
  }


}

?>
