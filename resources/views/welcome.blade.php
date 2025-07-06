@section('title', 'Welcome')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<x-guest-layout>
    <div class="p-4 w-100">
        <div class="text-center mb-4">
            <h3 class="h3 mb-2">Multi-Guard Auth</h3>
            <p class="text-muted mb-0">Please log in as a User or Admin to continue.</p>
        </div>

        @php
            $adminGuard = auth('admin')->check();
            $userGuard = auth('web')->check();
        @endphp

        <div class="d-grid gap-3 mt-4">
            @if ($adminGuard)
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">Go to Admin Dashboard</a>
            @elseif ($userGuard)
                <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Go to User Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary">User Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-success">User Register</a>
                <a href="{{ route('admin.login') }}" class="btn btn-outline-secondary">Admin Login</a>
            @endif
        </div>
    </div>
</x-guest-layout>
