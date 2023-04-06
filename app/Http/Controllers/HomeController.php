<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class HomeController extends Controller
{
    public function index()
    {
        $customers = new Customers;
        $customers = $customers::all();
        $data = compact('customers');
        return view('home')->with($data);
    }
}
