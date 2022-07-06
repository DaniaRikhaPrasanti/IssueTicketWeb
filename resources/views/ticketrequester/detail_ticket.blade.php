@extends('layouts.appuser')
@section("css")
<style>
  .timeline{list-style:none;padding:0 0 20px;position:relative;margin-top:-15px;border:1px solid #ccc; max-height:200px; overflow-y:auto}
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
  .badgecustom{font-size:1.1em;text-align:center;margin-right:--25px;border:1px solid #d4d4d4;padding:0.3rem;width:10%;margin-bottom:1.2%}
  .judul{color:#555B6B;font-size:1.1rem;font-weight:bold;margin:0}
  .ket{margin:0;padding:0.5rem 0;color:#A0A4A8;font-size:1.3rem}
</style>
@endsection
@section('contents')

<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
          <p class="card-title" style="font-weight:600;font-size:1.5rem;color:#555B6B;">Detail Ticket - Question</p>
        </div>
        <div class="card-body">
            <div class="container mb-3 col-10 col-md-12">
                <h5 style="color:#555B6B">Timeline</h5>
                    <ul class="timeline mt-2">
                        @foreach ($ticket as $tk)
                        <li>
                            @if($tk->Tick_Status == "Pending")
                            <a class="timeline-badge bg-danger" href="/ticket/{{ $tk->id }}/detail">
                                <small class="text-light">{{ $tk->Tick_Status }}</small>
                            </a>
                            @elseif ($tk->Tick_Status == "Requested")
                            <div class="timeline-badge bg-warning">
                                <small class="text-light">{{ $tk->Tick_Status }}</small>
                            </div>
                            @elseif ($tk->Tick_Status == "Open" || $tk->Tick_Status == "Work In Progres" || $tk->Tick_Status == "Work Done")
                            <div class="timeline-badge bg-primary">
                                <small class="text-light">{{ $tk->Tick_Status }}</small>
                            </div>
                            @elseif ($tk->Tick_Status == "Resolved")
                            <div class="timeline-badge bg-success">
                                <small class="text-light">{{ $tk->Tick_Status }}</small>
                            </div>
                            @endif
                            <div class="timeline-panel" style="width:90%">
                                <div class="timeline-heading">
                                    {{-- <h6 class="timeline-title text-muted">{{ 11/05/2022 }}</h6> --}}
                                    <h6 class="timeline-title text-muted">{{ date_format($tk->created_at, "d/m/Y") }}</h6>
                                </div>
                                <div class="timeline-body">
                                    {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui quisquam, ex . . . <br><small class="text-primary"><a href="#">Read more</a></small></p> --}}
                                    <p>{{ $tk->Tick_Issue }}<br><small class="text-primary"><a href="#">Read more</a></small></p>
                                </div>
                                <!-- <div class="float-right" style="float: right; margin-right: 60px ">
                                <button type="button" class="btn btn-outline-info">Save</button>
                                </div> -->

                                <a href="/ticketconvform/{{ $id_ticket }}">
	                            <button type="button" class="btn btn-outline-info" style="float: right; margin-right: 35px; margin-top: 15px">Respond</button>

	                            </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                <p class="judul">Status</p>
                    @foreach ($ticket as $tk)
                        @if($tk->Tick_Status == "Pending")
                        <div class="badgecustom bg-danger" href="/ticket/{{ $tk->id }}/detail">
                            <p style="margin:0;padding:0;display:inline-block;font-weight:bold;color:rgba(255, 255, 255, 0.87);">{{ $tk->Tick_Status }}</p>
                            <i class="fa fa-solid fa-angle-down"></i>
                        </div>
                        @elseif ($tk->Tick_Status == "Requested")
                        <div class="timeline-badge bg-warning">
                            <small class="text-light">{{ $tk->Tick_Status }}</small>
                        </div>
                        @elseif ($tk->Tick_Status == "Open" || $tk->Tick_Status == "Work In Progres" || $tk->Tick_Status == "Work Done")
                        <div class="timeline-badge bg-primary">
                            <small class="text-light">{{ $tk->Tick_Status }}</small>
                        </div>
                        @elseif ($tk->Tick_Status == "Resolved")
                        <div class="timeline-badge bg-success">
                            <small class="text-light">{{ $tk->Tick_Status }}</small>
                        </div>
                        @endif
                    @endforeach

                <h5 class="judul">Subject</h5>
                <div class="input-group mb-3" style="border:1px solid #CED4DA;background-color:#E9ECEF;border-radius:5px;vertical-align:baseline;align-items:center">
                    <i class="fa fa-duotone fa-filter" style="margin-left:1%;color:#A0A4A8;"></i>
                    <p class="ket">{{ $ticket[0]->Tick_Subj }}</p>
                </div>

                <h5 class="judul">Issues</h5>
                <div class="input-group mb-3" style="border:1px solid #CED4DA;background-color:#E9ECEF;border-radius:5px;height:200px">
                    <p class="ket" style="padding-left:1%">{{ $ticket[0]->Tick_Issue }}</p>
                </div>

                <div class="my-3 mb-4">
                    <div class="row">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <h5 class="judul">Attachment</h5>
                              <img src="{{ asset('storage/' . $ticket[0]->Tick_Attach) }}"  alt="Gambar Attachment">
                              <img src="{{ asset('storage/' . $ticket[0]->Tick_Attach) }}"  alt="Gambar Attachment">
                              <img src="{{ asset('storage/' . $ticket[0]->Tick_Attach) }}"  alt="Gambar Attachment">
                        </div>
                    </div>
                </div>
                <button type="reset" class="btn btn-outline-danger">Delete</button>
                <div class="float-right">
                    <button type="button" class="btn btn-outline-info">Save</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


@endsection

@section("script")
@endsection