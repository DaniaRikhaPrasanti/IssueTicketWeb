@extends('layouts.app')
@section('contents')

<div class="card mt-3">
    <div class="row">
        <div class="container mb-5 col-10 col-md-8">
            <h3 class="mt-4">Detail Requester</h3>
            <hr>
            <div class="form">
                <form action="POST">
                    <label for="Req_Name" class="form-label">Nama : </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" name="Req_Name" id="Req_Name" required value="{{ $requester->Req_Name }}" ria-label="Username" aria-describedby="basic-addon1"  disabled>
                    </div>

    
                    <label for="Req_Jabatan" class="form-label">Jabatan : </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">
                            <i class="fas fa-suitcase"></i>
                        </span>
                        <input type="text" class="form-control" name="Req_Jabatan" id="Req_Jabatan" required value="{{ $requester->Req_Jabatan }}" ria-label="Username" aria-describedby="basic-addon2" disabled>
                    </div>
                    
    
                    <label for="Req_Email" class="form-label">Email : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="text" class="form-control" id="Req_Email"  name="Req_Email" required value="{{ $requester->Req_Email }}" ria-label="Username" aria-describedby="basic-addon3" disabled>
                    </div>

                    <label for="Req_Password" class="form-label">Password : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="text" class="form-control" id="Req_Password"  name="Req_Password" required placeholder="password bersifat rahasi" ria-label="Username" aria-describedby="basic-addon3" disabled>
                    </div>
                    
    
                    <label for="Req_No" class="form-label">Phone Number : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon4">
                            <i class="fas fa-phone"></i>
                        </span>
                        <input type="text" class="form-control" id="Req_No" name="Req_No" required value="{{ $requester->Req_No }}" ria-label="Username" aria-describedby="basic-addon4" disabled>
                    </div>

                    
    
                    <label for="Req_Address" class="form-label">Address : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon5">
                            <i class="fas fa-home"></i>
                        </span>
                        <input type="text" class="form-control" name="Req_Address" id="Req_Address" required value="{{ $requester->Req_Address }}" ria-label="Username" aria-describedby="basic-addon5" disabled>
                    </div>


                    
    
                    <label for="Comp_No" class="form-label">Company Phone Number </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon5">
                            <i class="fas fa-phone"></i>
                        </span>
                        <input type="text" class="form-control" name="Comp_No" id="Comp_No" required value="{{ $requester->Comp_No }}" ria-label="Username" aria-describedby="basic-addon5" disabled>
                    </div>
                    {{-- ERROR DELETE TIDAK BERFUNGSI --}}
                    <div class="text-right mt-4">
                        
                        
                        
                        <a href="/requester/delete/{{$requester->id}}">
                            <button type="button" class="btn btn-danger" onclick="return confirm('Anda ingin menghapus Requester?')">Hapus</button>
                            
                        </a>
                        
                        
                        <a href="/requester/{{ $requester->id }}/edit">
                            <button type="button" class="btn btn-primary mx-2">Edit</button>
                        </a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>


@endsection