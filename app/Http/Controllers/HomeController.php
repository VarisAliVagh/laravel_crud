<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class HomeController extends Controller
{
    public function index(Request $search)  
    {
        $search = $_REQUEST['search'] ?? "";
        if($search != ""){
            $customers = Customers::where('first_name','LIKE',"%$search%")->get();  
        } 
        else{
            $customers = Customers::paginate(5);
        }
        $data = compact('customers','search');
        return view('home')->with($data);
    }
}
