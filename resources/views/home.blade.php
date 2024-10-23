@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h3>{{ __('Dashboard') }}</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bold">Welcome to the Company Employee System</h1>
                        <p class="lead">Manage your companies and employees with ease</p>
                    </div>

                    <div class="row g-4">
                        <!-- Manage Companies Section -->
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold">Manage Companies</h5>
                                    <p class="card-text text-muted">Easily create, update, and manage company records in the system.</p>
                                    <a href="{{ route('companies.index') }}" class="btn btn-primary mt-3 px-4">
                                        Manage Companies
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Manage Employees Section -->
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold">Manage Employees</h5>
                                    <p class="card-text text-muted">Maintain employee details such as contact info, join date, and more.</p>
                                    <a href="{{ route('employees.index') }}" class="btn btn-success mt-3 px-4">
                                        Manage Employees
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Company Reports Section -->
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold">Company Reports</h5>
                                    <p class="card-text text-muted">Generate detailed reports of companies and their employees.</p>
                                    <a href="#" class="btn btn-info mt-3 px-4">
                                        View Reports
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
