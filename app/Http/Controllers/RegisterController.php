<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use PhpParser\Node\NullableType;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
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
    public function update($id)
    {
        $customer = Customers::find($id);
        if(!is_null($customer)){
            $customer -> delete();
        }
        return redirect('/');
    }
}
