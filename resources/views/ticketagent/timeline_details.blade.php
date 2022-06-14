@extends('layouts.appuser')
@section('contents')

<div class="card mt-3">
    <div class="row">
        <div class="container mb-5 col-10 col-md-8">
            <div>
            <span><h3 class="mt-4">Timeline Detail</span>
            <span style ="background-color: red; border-radius: 4px; padding: 7px; color: white; 
            font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 15px; margin-left: 20px; center;"> Pending </span>
            </div>
            <hr>
            <div class="form">
                <form action="POST">
                    <label for="Req_Name" class="form-label">Requester : </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" id="Req_Name" required value="{{ $Req_Name }}" ria-label="Username" aria-describedby="basic-addon1">
                    </div>
                        
                    <label for="Tick_Subj" class="form-label">Subject : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="text" class="form-control" id="Tick_Subj" required value="{{ $Tick_Subj }}" ria-label="Username" aria-describedby="basic-addon3">
                    </div>

                    
                    <label for="Tick_Issue" class="form-label">Issue : </label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon4">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="text" class="form-control" id="Tick_Issue" required value="{{ $Tick_Issue }}" ria-label="Username" aria-describedby="basic-addon4">
                    </div>

                    <div class="my-3 mb-4">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6">
                                <label for="Tick_Attach" class="form-label">Attachment</label>
                                <div class="input-group mb-3">
                                <div style="display: flex; justify-content: center; gap: 50px;">
                                    <img src="" alt="gb 1">
                                    <img src="" alt="gb 2">
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- <div class="text-right mt-4">
                        <button type="button" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-primary mx-2">Edit</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>


@endsection