@extends('layouts/main')
@stack('title')
<title>Register</title>
@section('main-content')
{!! Form::open([
    'url' => empty($data) ? route('customer_insert') : route('customer_update',['id' => $data['id']]),
    'method' => 'post'
    ]) !!}
    <x-input type="text" name="first_name" id="first_name" label="First Name" for="first_name" value="{{ !empty($data) ? $data['first_name'] : ''     }}"/>
    <x-input type="text" name="last_name" id="last_name" label="Last Name" for="last_name" value="{{ !empty($data) ? $data['last_name'] : ''  }}"/>
    <x-input type="date" name="dob" id="dob" label="Dob" for="dob" value="{{ !empty($data) ? $data['dob'] : ''  }}"/>
    <x-input type="email" name="email" id="email" label="Email Address" for="email" value="{{ !empty($data) ? $data['email'] : ''     }}"/>
    @if(empty($data))
        <x-input type="password" name="password" id="password" label="Password" for="password" value=""/> 
    @endif  
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ url('/') }}" class="btn btn-primary">Back</a>
{!! Form::close() !!}
@endsection