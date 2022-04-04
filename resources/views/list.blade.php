@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('deleteSuccess'))
            <p style="color: green">{{ Session::get('deleteSuccess') }}</p>
            @endif
            @if (Session::has('updateSuccess'))
            <p style="color: green">{{ Session::get('updateSuccess') }}</p>
            @endif
            {{ $data->links() }}
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Join Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ (($currentPage-1)*2)+($count++) }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->age }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('updateCustomer',$item->id) }}"><button class="btn btn-sm btn-warning">Update</button></a>
                            <a href="{{ url('deleteCustomer/'.$item->id) }}"><button class="btn btn-sm btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <a href="{{ route('home') }}"><button class="btn btn-sm btn-outline-dark">Add</button></a>
    </div>
</div>
@endsection
