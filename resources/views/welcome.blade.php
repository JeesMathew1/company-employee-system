<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Company Employee System</title>
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="mt-16">
                    <h1 class="text-center text-xl font-semibold text-gray-900">Welcome to the Company Employee System</h1>
                </div>

                <div class="grid grid-cols-1 gap-4 mt-6 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Manage Companies Section -->
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold text-gray-900">Manage Companies</h2>
                        <p class="mt-2 text-sm text-gray-600">Easily create, update, and manage company records in the system.</p>
                        <!-- Create Company Button -->
                        {{-- <a href="{{ route('companies.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
                            Create Company
                        </a> --}}
                    </div>

                    <!-- Manage Employees Section -->
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold text-gray-900">Manage Employees</h2>
                        <p class="mt-2 text-sm text-gray-600">Maintain employee details such as contact info, join date, and more.</p>
                        <!-- Create Employee Button -->
                        {{-- <a href="{{ route('employees.index') }}" class="mt-4 inline-block px-4 py-2 bg-green-500 text-white font-semibold rounded hover:bg-green-600">
                            Create Employee
                        </a> --}}
                    </div>

                    <!-- Company Reports Section -->
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold text-gray-900">Company Reports</h2>
                        <p class="mt-2 text-sm text-gray-600">Generate detailed reports of companies and their employees.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
