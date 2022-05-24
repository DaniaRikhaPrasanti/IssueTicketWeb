@extends('layouts.main')
@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
            <form action="/loginuser" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">User Name / Email</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="email" placeholder="Masukkan username" required value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password" required value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="team" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Team
                    </label>
                  </div>
              <button class="w-10 btn btn-lg btn-primary mt-3" type="submit">Login</button>
            </form>
          </main>
    </div>
</div>
@endsection