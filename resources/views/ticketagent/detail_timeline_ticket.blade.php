@extends('layouts.appuser')
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
          <p class="card-title">Timeline Detail</p>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <label for="basic-url">Requester</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">$</span>
                  </div>
                  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly value="{{ $ticket->Tick_Req }}">
                </div>
                <label for="basic-url">Title</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">$</span>
                  </div>
                  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly>
                </div>
                <label for="basic-url">Issues</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">$</span>
                  </div>
                  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly value="{{ $ticket->Tick_Issue }}">
                </div>
              </div>

              <div class="col-md-12">
                <img src="#" alt="img-fluid">
              </div>

              <a href="#" class="btn btn-outline-danger">Delete Ticket</a>
            </div>
          </div>

        </div>
    </div>
  </div>
</div>


@endsection

@section("script")
@endsection