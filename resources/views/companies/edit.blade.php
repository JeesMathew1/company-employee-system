@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Company</h1>

    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $company->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" name="logo" class="form-control">
            <p>Current Logo: <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" width="100"></p>
        </div>

        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" class="form-control" value="{{ $company->contact_number }}" required>
        </div>

        <div class="form-group">
            <label for="annual_turnover">Annual Turnover</label>
            <input type="number" name="annual_turnover" class="form-control" value="{{ $company->annual_turnover }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Company</button>
    </form>
</div>
@endsection
