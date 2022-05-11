@extends('layouts.app')
@section('contents')

<div class="card mt-3">
    <div class="row">
        <div class="container mb-5 col-10 col-md-8">
            <h3 class="mt-4">Detail Ticket -  Question</h3>
            <hr>
            <div class="form">
                <form action="POST">
                    <label for="Tick_Subj" class="form-label">Timeline </label>
                        <input type="text" class="form-control" id="Tick_Subj" required ria-label="Username" aria-describedby="basic-addon1" placeholder="Masukkan Subject dari ticket...">
                    </div>
    
                    <label for="Tick_Issue" class="form-label">Reply </label>

                    <textarea class="form-control" id="Tick_Issue" rows="8" placeholder="Masukkan Isu yang dialami disini..."></textarea>

                    <div class="my-3 mb-4">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6">
                                <label for="Tick_Attach" class="form-label">Attachment</label>
                                <div class="border1 border-info">
                                    <div class="p-3">
                                        <input class="form-control form-control-md" type="file" id="Tick_Attach">
                                        <div id="attachmenthelp" class="form-text">Upload bukti pendukung masalah yang anda hadapi</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    

                    
                    <button type="reset" class="btn btn-outline-danger">Delete</button>
                    
                    <div class="float-right">
                        <button type="submit" class="btn btn-outline-info">Save</button>
                    </div>
                    
                    
                    
                </form>
            </div>
        </div>
    </div>
</div>


@endsection