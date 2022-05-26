@extends('layouts.app')
@section('contents')
<div class="card mt-3">
    <div class="row">
        <div class="container mb-5 col-10 col-md-8">
            <h3 class="mt-4">Tambah Agent</h3>
            <hr>
            <div class="form">
                <form action="/agent" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="Ag_Name" class="form-label">Name</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" name="Ag_Name" id="Ag_Name" class="form-control @error('Ag_Name') is-invalid @enderror" id="Ag_Name" required ria-label="Username" aria-describedby="basic-addon1" value="{{ old('Ag_Name') }}">
                        @error('Ag_Name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <label for="Ag_Email" class="form-label">Email </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" name="Ag_Email" id="Ag_Email" class="form-control @error('Ag_Email') is-invalid @enderror" id="Ag_Email" required ria-label="Username" aria-describedby="basic-addon3" value="{{ old('Ag_Email') }}">
                        @error('Ag_Email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <label for="Ag_Password" class="form-label">Password </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="password" name="Ag_Password" id="Ag_Password" class="form-control @error('Ag_Password') is-invalid @enderror" id="Ag_Password" reuired ria-label="Username" aria-describedby="basic-addon3"value="{{ old('Ag_Password') }}">
                        @error('Ag_Password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <label for="Ag_PasswordConfirmation" class="form-label">Password Confirmation</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="password" name="Ag_PasswordConfirmation"class="form-control @error('Ag_PasswordConfirmation') is-invalid @enderror" id="Ag_PasswordConfirmation" required ria-label="Username" aria-describedby="basic-addon3"value="{{ old('Ag_PasswordConfirmation') }}">
                        @error('Ag_PasswordConfirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <label for="Ag_No" class="form-label">Phone Number </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon4">
                            <i class="fas fa-phone"></i>
                        </span>
                        <input type="tel" name="Ag_No" id="Ag_No" class="form-control @error('Ag_No') is-invalid @enderror" id="Ag_No" required  ria-label="Username" aria-describedby="basic-addon4" value="{{ old('Ag_No') }}">
                        @error('Ag_No')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    
    
                    <label for="Ag_Address" class="form-label">Address </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon5">
                            <i class="fas fa-home"></i>
                        </span>
                        <input type="text" name="Ag_Address" id="Ag_Address" class="form-control @error('Ag_Address') is-invalid @enderror" id="Ag_Address" required ria-label="Username" aria-describedby="basic-addon5" value="{{ old('Ag_Address') }}" >
                        @error('Ag_Address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="checkbox mb-3">
                        <label>
                          <input type="checkbox" id="Team_Status" name="Team_Status" id="Team_Status" value="1"> Agen termasuk team
                        </label>
                    </div>

                    <div class="mt-4">
                        <a href="/agent" class="btn btn-outline-danger ">Cancel</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary mx-2 float-right" data-bs-toggle="modal" data-bs-target="#add">
                            Tambah
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                Anda ingin menambah Agen ?
                                </div>
                                <div class="text-center mb-4">
                                    <button type="button" class="btn btn-danger mx-2" data-bs-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary mx-2">Iya</button>
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection