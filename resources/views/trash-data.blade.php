@extends('layouts/main')
@stack('title')
<title>Trash Store</title>

@section('main-content')
<a href="{{ url('/') }}" class="btn btn-danger float-right mb-3">Go to home</a>
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
        @if(empty($customers->all()))
            <tr>
                <td colspan="5" class="text-center">Data not found</td>
            </tr>    
        @else
            @foreach($customers as $data)
            <tr>
                <td>{{ $data['first_name'] }}</td>
                <td>{{ $data['last_name'] }}</td>
                <td>{{ $data['email'] }}</td>
                <td>{{ $data['dob'] }}</td>
                <td>
                    <a href="{{ route('customer_delete',['id' => $data['id']]) }}" class="btn btn-danger">delete</a>
                    <a href="{{ route('data-restore',['id' => $data['id']]) }}" class="btn btn-primary">restore</a>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection