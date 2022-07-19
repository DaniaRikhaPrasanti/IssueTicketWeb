@extends('layouts.appuser')
@section('contents')

<div class="card mt-3">
    <div class="row">
        <div class="container mb-5 col-10 col-md-8">
            <div>
            <span><h3 class="mt-4">{{ $title }}</span>
            </div>
            <hr>
            <div class="form">
                <form action="POST">
                    <label for="Log_Creator" class="form-label">Requester : </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" id="Log_Creator" name="Log_Creator" required value="{{ $ticketConv->Log_Creator }}" ria-label="Username" aria-describedby="basic-addon1"disabled>
                    </div>
                    <label for="Log_Title" class="form-label">Title : </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" id="Log_Title" name="Log_Title" required value="{{ $ticketConv->Log_Title }}" ria-label="Username" aria-describedby="basic-addon1"disabled>
                    </div>
                    <label for="Log_Desc" class="form-label">Desc : </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" id="Log_Desc" name="Log_Desc" required value="{{ $ticketConv->Log_Desc }}" ria-label="Username" aria-describedby="basic-addon1"disabled>
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