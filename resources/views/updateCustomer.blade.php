@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- @if (Session::has('insertSuccess'))
            <p style="color: green">{{ Session::get('insertSuccess') }}</p>
            @endif --}}
            <form action="{{ route('update') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $data->id }}" name="customer_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                        value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age"
                        value="{{ $data->age }}">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control"
                        id="gender"
                        name="gender">
                            @if ($data->gender == 'male')
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            @elseif ($data->gender == 'female')
                                <option value="male">Male</option>
                                <option value="female" selected>Female</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone"
                        value="{{ $data->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                        value="{{ $data->address }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
</div>
@endsection
