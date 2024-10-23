@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Employee</h1>

    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="company">Company</label>
            <select name="company_id" class="form-control" required>
                <option value="">Select Company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="mobile_number">Mobile Number</label>
            <input type="text" name="mobile_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Profile Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="join_date">Join Date</label>
            <input type="date" name="join_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Add Employee</button>
    </form>
</div>
@endsection
