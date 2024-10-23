@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $company->name }}</h1>
    <p><strong>Description:</strong> {{ $company->description }}</p>
    <p><strong>Contact Number:</strong> {{ $company->contact_number }}</p>
    <p><strong>Annual Turnover:</strong> {{ $company->annual_turnover }}</p>
    <p><strong>Created At:</strong> {{ $company->created_at}}</p>
    <p><strong>Updated At:</strong> {{ $company->updated_at}}</p>
    {{-- <p><strong>Created At:</strong> {{ $company->created_at->timezone(Auth::user()->timezone)->format('Y-m-d H:i A') }}</p>
    <p><strong>Updated At:</strong> {{ $company->updated_at->timezone(Auth::user()->timezone)->format('Y-m-d H:i A') }}</p> --}}

    <h3>Employees</h3>
    @if($company->employees->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Join Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($company->employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->mobile_number }}</td>
                        <td>{{ $employee->join_date }}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No employees found for this company.</p>
    @endif
</div>
@endsection
