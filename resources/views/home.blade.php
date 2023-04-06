@extends('layouts/main')
@stack('title')
<title>Home</title>

@section('main-content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">first name</th>
            <th scope="col">last name</th>
            <th scope="col">email</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $data)
        <tr>
            <td>{{ $data['first_name'] }}</td>
            <td>{{ $data['last_name'] }}</td>
            <td>{{ $data['email'] }}</td>
            <td>
                <a href="{{ route('customer_delete',['id' => $data['id']]) }}" class="btn btn-danger">delete</a>
                <a href="{{ route('customer_update',['id' => $data['id']]) }}" class="btn btn-primary">update</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/register" class="btn btn-primary">Register</a>
@endsection