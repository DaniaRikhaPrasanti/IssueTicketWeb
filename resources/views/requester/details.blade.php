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
                        <input type="text" class="form-control" id="Req_Name" required value="{{ $Req_Name }}" ria-label="Username" aria-describedby="basic-addon1">
                    </div>

    
                    <label for="Req_Jabatan" class="form-label">Req_Jabatan : </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">
                            <i class="fas fa-suitcase"></i>
                        </span>
                        <input type="text" class="form-control" id="Req_Jabatan" required value="{{ $Req_Jabatan }}" ria-label="Username" aria-describedby="basic-addon2">
                    </div>
                    
    
                    <label for="Req_Email" class="form-label">Email : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="text" class="form-control" id="Req_Email" required value="{{ $Req_Email }}" ria-label="Username" aria-describedby="basic-addon3">
                    </div>

                    
    
                    <label for="Req_No" class="form-label">Phone Number : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon4">
                            <i class="fas fa-phone"></i>
                        </span>
                        <input type="text" class="form-control" id="Req_No" required value="{{ $Req_No }}" ria-label="Username" aria-describedby="basic-addon4">
                    </div>

                    
    
                    <label for="Req_Address" class="form-label">Address : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon5">
                            <i class="fas fa-home"></i>
                        </span>
                        <input type="text" class="form-control" id="Req_Address" required value="{{ $Req_Address }}" ria-label="Username" aria-describedby="basic-addon5">
                    </div>


                    
    
                    <label for="Comp_No" class="form-label">Company Phone Number </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon5">
                            <i class="fas fa-phone"></i>
                        </span>
                        <input type="text" class="form-control" id="Comp_No" required value="{{ $Comp_No }}" ria-label="Username" aria-describedby="basic-addon5">
                    </div>
                    


                    <div class="text-right mt-4">
                        <button type="button" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-primary mx-2">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection