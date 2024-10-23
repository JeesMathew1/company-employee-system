@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Company</h1>

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" name="logo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="annual_turnover">Annual Turnover</label>
            <input type="number" name="annual_turnover" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Create Company</button>
    </form>
</div>
@endsection
