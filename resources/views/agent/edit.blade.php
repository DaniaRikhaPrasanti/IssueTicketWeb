@extends('layouts.app')
@section('contents')

<div class="card mt-3">
    <div class="row">
        <div class="container mb-5 col-10 col-md-8">
            <h3 class="mt-4">Edit Agent</h3>
            <hr>
            <div class="form">
                <form method="POST" action="/agent/{{ $id}} " >
                    @method('put')
                    @csrf
                    <label for="Ag_Name" class="form-label">Nama : </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" id="Ag_Name" name="Ag_Name" required value="{{ $Ag_Name }}" ria-label="Username" aria-describedby="basic-addon1">
                    </div>
                        
                    <label for="Ag_Email" class="form-label">Email : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="text" class="form-control" id="Ag_Email" name="Ag_Email" required value="{{ $Ag_Email }}" ria-label="Username" aria-describedby="basic-addon3">
                    </div>
                    <label for="Ag_Password" class="form-label">Password : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="text" class="form-control" id="Ag_Password"  name="Ag_Password" required value="{{ $Ag_Password }}" ria-label="Username" aria-describedby="basic-addon3">
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
                    <label for="Ag_No" class="form-label">Phone Number : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon4">
                            <i class="fas fa-phone"></i>
                        </span>
                        <input type="text" class="form-control" id="Ag_No" name="Ag_No" required value="{{ $Ag_No }}" ria-label="Username" aria-describedby="basic-addon4">
                    </div>

                    
                    <label for="Ag_Address" class="form-label">Address : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon5">
                            <i class="fas fa-home"></i>
                        </span>
                        <input type="text" class="form-control" id="Ag_Address" name="Ag_Address" required value="{{ $Ag_Address }}" ria-label="Username" aria-describedby="basic-addon5">
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" id="Team_Status" name="Team_Status" value="1" {{$Team_Status || old('Team_Status',0) === 1? 'checked':'' }}> Agen termasuk team
                          <!-- <input type="checkbox" id="Team_Status" name="Team_Status" value="{{ $Team_Status }}"> Agen termasuk team -->
                        </label>
                    </div>

                    <div class="mt-4">
                        <a href="/agent" class="btn btn-outline-danger ">Cancel</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary mx-2 float-right" data-bs-toggle="modal" data-bs-target="#add">
                            Save
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                Simpan Perubahan Pada Agen ?
                                </div>
                                <div class="text-center mb-4">
                                    <button type="button" class="btn btn-danger mx-2" data-bs-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary mx-2">Iya</button>
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