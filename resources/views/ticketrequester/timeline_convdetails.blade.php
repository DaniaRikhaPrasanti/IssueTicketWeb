@extends('layouts.appuser')
@section('contents')

<div class="card mt-3">
    <div class="row">
        <div class="container mb-5 col-10 col-md-8">
            <div>
            <span><h3 class="mt-4">{{ $title }}</span>
            <span style ="background-color: red; border-radius: 4px; padding: 7px; color: white; 
            font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 15px; margin-left: 20px; center;"> Pending </span>
            </div>
            <hr>
            <div class="form">
                <form action="POST">
                    <label for="Log_Creator" class="form-label">Pengirim : </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" id="Log_Creator" name="Log_Creator" required value="{{ $ticketConv->Log_Creator }}" ria-label="Username" aria-describedby="basic-addon1"disabled>
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