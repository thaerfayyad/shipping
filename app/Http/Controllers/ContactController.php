<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


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
       return view('Site.contact.index');
    }
    public function create()
    {
        
    }
    public function store(Request $request){
          $con =new Contact();
        $con->name=$request->name;
        $con->email=$request->email;
        $con->company=$request->company;
        $con->phone=$request->phone;
        $con->message=$request->message;

        $con ->save();
       
        session()->flash("success","تمت الاضافة بنجاح");
        return redirect()->back();
    }
    public function destroy($id)
    {
        
    }




}
