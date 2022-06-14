@extends('layouts.appuser')
@section('contents')
  
<div class="card mt-3">
    <div class="row">
        <div class="container mb-5 col-10 col-md-8">
            <h3 class="mt-4">Form Buat Ticket</h3>
            <hr>
            <div class="form">
                <form method="post" action="/ticket" enctype="multipart/form-data">
                    @csrf
                    <label for="Tick_Subj" class="form-label">Subject : </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-comment"></i>
                        </span>
                        <input type="text" name="Tick_Subj" class="form-control"  @error('Tick_Subj') is-invalid @enderror" id="Tick_Subj" required ria-label="Username" aria-describedby="basic-addon1" placeholder="Masukkan Subject dari ticket..." value="{{ old('Tick_Subj') }}">
                        @error('Tick_Subj')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

    
                    <label for="Tick_Type" class="form-label">Type :  </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">
                            <i class="fas fa-book"></i>
                        </span>
                        <select name="Tick_Type" id="Tick_Type" class="form-control">
                            <option value="Question">Question</option>
                            <option value="Incident">Incident</option>
                            <option value="Problem">Problem</option>
                            <option value="Feature Request">Feature Request</option>
                        </select>
                    </div>

                    
                    <label for="Tick_Issue" class="form-label">Issues : </label>
                    <div>
                        <textarea class="form-control" name="Tick_Issue" id="Tick_Issue" rows="8" placeholder="Masukkan Isu yang dialami disini..."></textarea>
                        @error('Tick_Issue')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="my-3 mb-4">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6">
                                <label for="Tick_Attach" class="form-label">Attachment</label>
                                <div class="border1 border-info">
                                    <div class="p-3">
                                        <input class="form-control form-control-md" type="file" id="Tick_Attach" name="Tick_Attach">
                                        <div id="attachmenthelp" class="form-text">Upload bukti pendukung masalah yang anda hadapi</div>
                                        @error('Tick_Attach')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
 
                    <div class="mt-4">
                        <a href="/ticket" class="btn btn-outline-danger ">Cancel</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary mx-2 float-right" data-bs-toggle="modal" data-bs-target="#add">
                            Tambah
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                Anda ingin mengirim Ticket ?
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