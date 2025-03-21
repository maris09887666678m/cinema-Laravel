@extends('layouts.app')

@section('content')
    {{-- User Profile --}}
    <section id="user-profile" class="container py-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h2 class="card-title text-center text-primary">User Profile</h2>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <h5 class="fw-bold">Name</h5>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold">Username</h5>
                        <p>&commat;{{ $user->username }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold">Age</h5>
                        <p>{{ $user->age }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold">Balance</h5>
                        <p class="badge bg-success">Rp {{ number_format($user->balance) }}</p>
                    </div>
                </div>
                <div class="text-end mt-4">
                    <a href="{{ route('users.edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Top Up Balance Form --}}
    <section id="top-up-balance" class="container py-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h2 class="card-title text-center text-primary">Top Up Balance</h2>
                <form action="{{ route('users.update', $user) }}" method="POST" class="mt-4">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="amount" class="form-label fw-bold">Amount (Rp)</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="amount" id="amount" class="form-control" required>
                        </div>
                        @error('amount')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Top Up</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
