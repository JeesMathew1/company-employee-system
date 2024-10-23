@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
        </div>

        <div class="form-group">
            <label for="company">Company</label>
            <select name="company_id" class="form-control" required>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="mobile_number">Mobile Number</label>
            <input type="text" name="mobile_number" class="form-control" value="{{ $employee->mobile_number }}" required>
        </div>

        <div class="form-group">
            <label for="image">Profile Image</label>
            <input type="file" name="image" class="form-control">
            <p>Current Image: <img src="{{ asset('storage/' . $employee->image) }}" alt="{{ $employee->name }}" width="100"></p>
        </div>

        <div class="form-group">
            <label for="join_date">Join Date</label>
            <input type="date" name="join_date" class="form-control" value="{{ $employee->join_date }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Employee</button>
    </form>
</div>
@endsection
