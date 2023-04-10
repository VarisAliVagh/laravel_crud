@extends('layouts/main')
@stack('title')
<title>Home</title>

@section('main-content')
<a href="{{ url('/') }}/trash-data" class="btn btn-danger float-right mb-3">Go to trash</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">first name</th>
            <th scope="col">last name</th>
            <th scope="col">email</th>
            <th scope="col">dob</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $data)
        <tr>
            <td>{{ $data['first_name'] }}</td>
            <td>{{ $data['last_name'] }}</td>
            <td>{{ $data['email'] }}</td>
            <td>{{ $data['dob'] }}</td>
            <td>
                <a href="{{ route('customer_delete',['id' => $data['id']]) }}" class="btn btn-danger">delete</a>
                <a href="{{ route('customer_edit',['id' => $data['id']]) }}" class="btn btn-primary">edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row pagination">
    {{ $customers}}
</div>
<a href="/register" class="btn btn-primary">Register</a>
@endsection