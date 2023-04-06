@extends('layouts/main')
@stack('title')
<title>Register</title>

@section('main-content')
<form action="{{ route('customer_insert') }}" method="POST">
    @csrf
    <x-input type="text" name="first_name" id="first_name" label="First Name" for="first_name"/>
    <x-input type="text" name="last_name" id="last_name" label="Last Name" for="last_name"/>
    <x-input type="email" name="email" id="email" label="Email Address" for="email"/>
    <x-input type="password" name="password" id="password" label="Password" for="password"/>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection