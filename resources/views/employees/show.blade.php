@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $employee->name }}</h1>

    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $employee->image) }}" alt="{{ $employee->name }}" class="img-fluid">
        </div>
        <div class="col-md-8">
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Company:</strong> {{ $employee->company->name }}</p>
            <p><strong>Mobile Number:</strong> {{ $employee->mobile_number }}</p>
            <p><strong>Created By:</strong> {{ $employee->created_by }}</p>
            <p><strong>Join Date:</strong> {{ $employee->join_date }}</p>
            <p><strong>Created At:</strong> {{ $employee->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $employee->updated_at }}</p>

        </div>
    </div>

    <a href="{{ route('employees.index') }}" class="btn btn-primary">Back to Employees</a>
</div>
@endsection
