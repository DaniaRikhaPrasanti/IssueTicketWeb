@extends('layouts.app')
@section('contents')

<div class="card mt-3">
    <div class="row">
        <div class="container mb-5 col-10 col-md-8">
            <h3 class="mt-4">Form Buat Ticket</h3>
            <hr>
            <div class="form">
                <form action="POST">
                    <label for="Tick_Subj" class="form-label">Subject : </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-comment"></i>
                        </span>
                        <input type="text" class="form-control" id="Tick_Subj" required ria-label="Username" aria-describedby="basic-addon1" placeholder="Masukkan Subject dari ticket...">
                    </div>

    
                    <label for="Tick_Type" class="form-label">Type :  </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">
                            <i class="fas fa-book"></i>
                        </span>
                        <select name="Tick_Type" id="" class="form-control">
                            <option value="Question">Question</option>
                            <option value="Incident">Incident</option>
                            <option value="Problem">Problem</option>
                            <option value="Feature Request">Feature Request</option>
                          </select>
                    </div>
                    
    
                    <label for="Tick_Issue" class="form-label">Issues : </label>

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
                    

                    
                    <button type="reset" class="btn btn-outline-danger">Cancel</button>
                    
                    <div class="float-right">
                        <button type="button" class="btn btn-outline-info">Create</button>
                    </div>
                    
                    
                    
                </form>
            </div>
        </div>
    </div>
</div>


@endsection