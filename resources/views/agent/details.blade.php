@extends('layouts.app')
@section('contents')

<div class="card mt-3">
    <div class="row">
        <div class="container mb-5 col-10 col-md-8">
            <h3 class="mt-4">Detail Agent</h3>
            <hr>
            <div class="form">
                <form action="POST">
                    <label for="Ag_Name" class="form-label">Nama : </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" id="Ag_Name" required value="{{ $agent->Ag_Name }}" ria-label="Username" aria-describedby="basic-addon1" disabled>
                    </div>
                        
                    <label for="Ag_Email" class="form-label">Email : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="text" class="form-control" id="Ag_Email" required value="{{ $agent->Ag_Email }}" ria-label="Username" aria-describedby="basic-addon3" disabled>
                    </div>

                    <label for="Ag_Password" class="form-label">Password : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="text" class="form-control" id="Ag_Password"  name="Ag_Password" required placeholder="Password bersifat rahasia" ria-label="Username" aria-describedby="basic-addon3" disabled>
                    </div>
                    <label for="Ag_No" class="form-label">Phone Number : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon4">
                            <i class="fas fa-phone"></i>
                        </span>
                        <input type="text" class="form-control" id="Ag_No" required value="{{ $agent->Ag_No }}" ria-label="Username" aria-describedby="basic-addon4" disabled>
                    </div>

                    
                    <label for="Ag_Address" class="form-label">Address : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon5">
                            <i class="fas fa-home"></i>
                        </span>
                        <input type="text" class="form-control" id="Ag_Address" required value="{{ $agent->Ag_Address }}" ria-label="Username" aria-describedby="basic-addon5" disabled>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" id="Team_Status" name="Team_Status" value="1" {{$agent->Team_Status || old('Team_Status',0) === 1? 'checked':'' }} disabled> Agen termasuk team
                        </label>
                    </div>

                    <div class="text-right mt-4">
                        <a href="/agent/delete/{{$agent->id}}">
                            <button type="button" class="btn btn-danger" onclick="return confirm('Anda ingin menghapus Agent?')">Hapus</button>
                        </a>
                        <a href="/agent/{{ $agent->id }}/edit">
                            <button type="button" class="btn btn-primary mx-2">Edit</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection