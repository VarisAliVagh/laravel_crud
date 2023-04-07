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
            'email'      => 'required|email',
            'password'   => 'required'
        ]);

        $db = new Customers;

        $db -> first_name = $req['first_name'];
        $db -> last_name = $req['last_name'];
        $db ->  email = $req['email'];
        $db -> password = md5($req['password']);

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
            $customer -> save();

            return redirect('/');
        }
    }
}
