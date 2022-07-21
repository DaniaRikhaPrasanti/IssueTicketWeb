@extends('layouts.app')
@section("css")
<style>
  .timeline{list-style:none;padding:0 0 20px;position:relative;margin-top:-15px;border:1px solid #ccc}
  .timeline:before{top:30px;bottom:25px;position:absolute;content:" ";width:3px;background-color:#ccc;left:25px;margin-right:-1.5px}.timeline>li,.timeline>li>.timeline-panel{margin-bottom:5px;position:relative}.timeline>li:after,.timeline>li:before{content:" ";display:table}.timeline>li:after{clear:both}.timeline>li>.timeline-panel{margin-left:96px;float:left;top:19px;padding:4px 10px 8px 15px;border-radius:5px;width:45%}.timeline>li>.timeline-badge{color:#fff;width:72px;height:36px;font-size:1.2em;text-align:center;position:absolute;top:26px;left:9px;margin-right:-25px;background-color:#fff;z-index:100;border-radius:5px;border:1px solid #d4d4d4}.timeline>li.timeline-inverted>.timeline-panel{float:left}
  .timeline>li.timeline-inverted>
  .timeline-panel:before{border-right-width:0;border-left-width:15px;right:-15px;left:auto}
  .timeline>li.timeline-inverted>
  .timeline-panel:after{border-right-width:0;border-left-width:14px;right:-14px;left:auto}
  .timeline-badge.primary{background-color:#2e6da4!important}
  .timeline-badge.success{background-color:#3f903f!important}
  .timeline-badge.warning{background-color:#f0ad4e!important}
  .timeline-badge.danger{background-color:#d9534f!important}
  .timeline-badge.info{background-color:#5bc0de!important}
  .timeline-title{margin-top:0;color:inherit}
  .timeline-body>p,
  .timeline-body>ul{margin-bottom:0;margin-top:0}
  .timeline-body>p+p{margin-top:5px}
  .timeline-badge>
  .glyphicon{margin-right:0px;color:#fff}
  .timeline-body>h4{margin-bottom:0!important}
</style>
@endsection
@section('contents')

<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
          <p class="card-title">Detail Ticket - Question</p>
        </div>
        <form method="post" action="/ticketconv" enctype="multipart/form-data">

        @csrf
        <div class="card-body">
            <div class="container mb-3 col-10 col-md-12">
                <input class="form-control form-control-md" type="text" id="ticket_id" name="ticket_id" value="{{ $ticket_id }}" hidden>
                <label for="Log_Title" class="form-label">Title </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">
                            <i class="fas fa-suitcase"></i>
                        </span>
                        <input type="text" name="Log_Title" class="form-control @error('Log_Title') is-invalid @enderror" id="Log_Title" required  ria-label="Username" aria-describedby="basic-addon2"value="{{ old('Log_Title') }}">
                        @error('Log_Title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
               

                <label for="Log_Desc" class="form-label">Replay : </label>
                    <div>
                        <textarea class="form-control" name="Log_Desc" id="Log_Desc" rows="8" placeholder="Masukkan Isu yang dialami disini..."></textarea>
                        @error('Log_Desc')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
    
                    <div class="my-3 mb-4">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6">
                                <label for="Log_Attachment" class="form-label">Attachment</label>
                                <div class="border1 border-info">
                                    <div class="p-3">
                                        <input class="form-control form-control-md" type="file" id="Log_Attachment" name="Log_Attachment">
                                        <div id="attachmenthelp" class="form-text">Cantumkan file atau foto untuk membantu pemecahan solusi</div>
                                        @error('Log_Attachment')
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
                            Save
                        </button>

                    <!-- Modal -->
                    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                Anda ingin menambah Respond ?
                                </div>
                                <div class="text-center mb-4">
                                    <button type="button" class="btn btn-danger mx-2" data-bs-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary mx-2">Iya</button>
                                </div>
                            </div>
                            </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
  </div>
</div>


@endsection

@section("script")
@endsection