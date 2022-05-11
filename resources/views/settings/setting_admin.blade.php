@extends('layouts.app')
@section('contents')
<div class="card mt-3">
    <div class="row">
        <div class="container mb-5 col-10 col-md-8">
            <h3 class="mt-4">Setting</h3>
            <hr>
            <div class="form">
                <form method="post" action="/requester" enctype="multipart/form-data">
                    @csrf
                    <label for="Req_Name" class="form-label">Expiry Duration</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-clock"></i>
                        </span>
                        <input type="text" class="form-control @error('Req_Name') is-invalid @enderror" id="Req_Name" required ria-label="Username" aria-describedby="basic-addon1"value="{{ old('Req_Name') }}">
                        @error('Req_Name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <a href="/requester" class="btn btn-outline-danger ">Cancel</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary mx-2 float-right" data-bs-toggle="modal" data-bs-target="#add">
                            Simpan
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                Anda ingin menyimpan perubahan pengaturan ?
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
