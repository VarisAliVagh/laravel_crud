<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use PhpParser\Node\NullableType;

class RegisterController extends Controller
{
    public function index()
    {
        $url = url('/');
        $data = compact('url');
        return view('register')->with($data);
    }
    public function insert(Request $req)
    {
        $req -> validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'dob'        => 'required',
            'email'      => 'required|email',
            'password'   => 'required'
        ]);

        $db = new Customers;

        $db -> first_name = $req['first_name'];
        $db -> last_name = $req['last_name'];
        $db ->  email = $req['email'];
        $db -> password = md5($req['password']);
        $db -> dob = $req['dob'];

        $db -> save();

        return redirect('/');
    }
    public function delete($id)
    {
        $customer = Customers::find($id);
        if(!is_null($customer)){
            $customer -> delete();
        }
        return redirect('/');
    }
    public function edit($id)
    {
        $customer = Customers::find($id);        
        $data = $customer -> toarray();
        if(is_null($customer)){
            return redirect('/');
        }
        else{
            $data = compact('data');
            return view('register')->with($data);
        }
    }
    public function update(Request $req,$id)
    {
        $customer = Customers::find($id);        
        $data = $customer -> toarray();
        if(is_null($customer)){
            return redirect('/');
        }
        else{
            $customer -> first_name = $req['first_name']; 
            $customer -> last_name = $req['last_name'];
            $customer -> email = $req['email'];
            $customer -> dob = $req['dob'];

            $customer -> save();

            return redirect('/');
        }
    }
    public function trash()
    {
        $customers = Customers::onlyTrashed()->get();
        $data = compact('customers');
        return view('trash-data')->with($data);     
    }
    public function force_delete($id)
    {
        
        $customers = Customers::withTrashed()->find($id);

        if(!is_null($customers)){
            $customers -> forceDelete();
        }

        return redirect('/');
    }
    public function restore($id)
    {
        Customers::withTrashed()->find($id)->restore();      
        return redirect('/');
    }
    
    public function upload_file(Request $data)
    {
        echo $data -> file('data') -> store('uploads');
    }
}
