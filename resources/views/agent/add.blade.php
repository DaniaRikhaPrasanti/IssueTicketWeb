@extends('layouts.app')
@section('contents')
<div class="card mt-3">
    <div class="row">
        <div class="container mb-5 col-10 col-md-8">
            <h3 class="mt-4">Tambah Agent</h3>
            <hr>
            <div class="form">
                <form method="post" action="/requester" enctype="multipart/form-data">
                    @csrf
                    <label for="Req_Name" class="form-label">Name</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control @error('Req_Name') is-invalid @enderror" id="Req_Name" required ria-label="Username" aria-describedby="basic-addon1"value="{{ old('Req_Name') }}">
                        @error('Req_Name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <label for="Req_Email" class="form-label">Email </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" class="form-control @error('Req_Email') is-invalid @enderror" id="Req_Email" required ria-label="Username" aria-describedby="basic-addon3"value="{{ old('Req_Email') }}">
                        @error('Req_Email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <label for="Req_No" class="form-label">Phone Number </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon4">
                            <i class="fas fa-phone"></i>
                        </span>
                        <input type="tel" class="form-control @error('Req_No') is-invalid @enderror" id="Req_No" required  ria-label="Username" aria-describedby="basic-addon4"value="{{ old('Req_No') }}">
                        @error('Req_No')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    
    
                    <label for="Req_Address" class="form-label">Address </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon5">
                            <i class="fas fa-home"></i>
                        </span>
                        <input type="text" class="form-control @error('Req_Address') is-invalid @enderror" id="Req_Address" required ria-label="Username" aria-describedby="basic-addon5" value="{{ old('Req_Address') }}" >
                        @error('Req_Address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="checkbox mb-3">
                        <label>
                          <input type="checkbox" value=""> Agen termasuk team
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