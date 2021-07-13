<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

//        $this->middleware(['guest']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     *
     */
    public function index(){
        $contacts =Contact::all();
        return view('admin.contacts.index',[
            'contacts'=>$contacts
        ]);
    }
    public function create()
    {
       
    }
    public function store(Request $request){
      
    }
    public function destroy($id)
    {
        $item = Contact::where('id',$id);
        $item->delete();
        return redirect()->route('contacts.index')
            ->with('success', 'contacts deleted successfully');
    }




}
