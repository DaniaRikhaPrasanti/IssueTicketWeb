@extends('layouts.app')
@section("css")
<style>
  .glyphicon{margin-right:0px;color:#fff}
  .badgecustom{font-size:1.1em;text-align:center;margin-right:--25px;border:1px solid #d4d4d4;padding:0.3rem;width:10%;margin-bottom:1.2%}
  .judul{color:#555B6B;font-size:1.1rem;font-weight:bold;margin:0}
  .ket{margin:0;padding:0.5rem 0;color:#A0A4A8;font-size:1.3rem}
  .timelineticketconv{list-style:none;padding:0 0 20px;position:relative;margin-top:-15px;border:1px solid #ccc; max-height:200px; overflow-y:auto}
  .vertical-timeline {
    width: 100%;
    position: relative;
    padding: 1rem 0 1rem;
    
}

.vertical-timeline::before {
    content: '';
    position: absolute;
    top: 0;
    left: 42px;
    height: 100%;
    width: 4px;
    background: #e9ecef;
    border-radius: .25rem;
}

.vertical-timeline-element {
    position: relative;
}

.vertical-timeline--animate .vertical-timeline-element-icon.bounce-in {
    visibility: visible;
    animation: cd-bounce-1 .8s;
}
.vertical-timeline-element-icon {
    position: absolute;
    top: 0;
    left: 20px;
}

.vertical-timeline-element-icon .badge-dot-xl {
    box-shadow: 0 0 0 5px #fff;
}

.badge:empty {
    display: none;
}


.vertical-timeline-element-content {
    position: relative;
    margin-left: 90px;
    font-size: .8rem;
}

.vertical-timeline-element-content .timeline-title {
    font-size: .8rem;
    text-transform: uppercase;
    margin: 0 0 .5rem;
    padding: 2px 0 0;
    font-weight: bold;
}

.vertical-timeline-element-content .vertical-timeline-element-date {
    display: block;
    position: absolute;
    left: -90px;
    top: 0;
    padding-right: 10px;
    text-align: right;
    color: #adb5bd;
    font-size: .7619rem;
    white-space: nowrap;
}

.vertical-timeline-element-content:after {
    content: "";
    display: table;
    clear: both;
}
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
            <div class="container mb-3">
                <h5 style="color:#555B6B">Timeline TicketConv</h5>
                    <ul class="timelineticketconv mt-3">
                        
                        <li>
                            
                            @foreach ($ticketconv as $tk)
                            <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                <div class="vertical-timeline-item vertical-timeline-element">
                                    <div>
                                        <span class="vertical-timeline-element-icon bounce-in">
                                            @if($tk->Tick_Status == 1 )
                                            <i class="badge badge-danger">Pending</i>
                                            @elseif($tk->Tick_Status == 2 )
                                            <i class="badge badge-warning">Open</i>
                                            @elseif($tk->Tick_Status == 3 )
                                            <i class="badge badge-primary">WIP</i>
                                            @elseif($tk->Tick_Status == 4 )
                                            <i class="badge badge-primary">Work Done</i>
                                            @elseif($tk->Tick_Status == 5 )
                                            <i class="badge badge-primary">Resolved</i>
                                            @elseif($tk->Tick_Status == 6 )
                                            <i class="badge badge-success">Closed</i>
                                            @else
                                            <i class="badge badge-danger">{{ $tk->Tick_Status}}</i>
                                            @endif
                                        </span>
                                        <div class="vertical-timeline-element-content bounce-in">
                                            <h6 class="timeline-title-ticketconv text-muted">{{ date_format($tk->created_at, "d/m/Y") }}</h6>
                                            <p>{{ $tk->Log_Desc }}<br><small class="text-primary">
                                                <a href="/ticketconv/{{ $tk->id }}">Read more</a>
                                            </small></p>
                                        </div>
                                    </div>
                            </div>                     
                            </div>
                            @endforeach

                            <a href="/ticketconvform/{{ $id_ticket }}">
	                            <button type="button" class="btn btn-outline-info" style="float: right; margin-right: 35px; margin-top: 15px">Respond</button>
	                        </a>
                        </li>
                    </ul>
                <form method="post" action="{{ route('ticket.update', $id_ticket) }}" 
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div style="display:inline-block;width:20%">
                    <p class="judul">Status</p>
                    <select name="status" type="number" id="status" class="btn-danger">
                        @foreach ($ticket_status as $ticket)
                            <option value="{{ $ticket->id }}">{{ $ticket->status }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="display:inline-block;width:40%" >
                    <p class="judul">Priority</p>
                    <select class="btn-default" name="priority" type="text" id="priority">
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                        <option value="Critical">Critical</option>
                    </select>
                </div>
                    <!-- @foreach ($tickets as $ticket)
                    <button type="button" class="btn
                    @if ($ticket->ticket_status_id == 1) btn-danger 
                    @elseif ($ticket->ticket_status_id == 2) btn-primary 
                    @elseif ($ticket->ticket_status_id == 3) btn-primary 
                    @elseif ($ticket->ticket_status_id == 4) btn-primary 
                    @elseif ($ticket->ticket_status_id == 5) btn-success 
                    @else btn-secondary 
                    @endif">{{ $ticket->TicketStatus->status }}</button>
                    @endforeach -->

                <h5 class="judul" style="padding-top:1.5%">Subject</h5>
                <div class="input-group mb-3" style="border:1px solid #CED4DA;background-color:#E9ECEF;border-radius:5px;vertical-align:baseline;align-items:center">
                    <i class="fa fa-duotone fa-filter" style="margin-left:1%;color:#A0A4A8;"></i>
                    <p class="ket">{{ $ticket->Tick_Subj }}</p>
                </div>

                <h5 class="judul">Issues</h5>
                <div class="input-group mb-3" style="border:1px solid #CED4DA;background-color:#E9ECEF;border-radius:5px;height:200px">
                    <p class="ket" style="padding-left:1%">{{ $ticket->Tick_Issue }}</p>
                </div>

                <div class="my-3 mb-4">
                    <div class="row">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <h5 class="judul">Attachment</h5>
                              <img src="{{ asset('storage/' . $ticket->Tick_Attach) }}"  alt="Gambar Attachment">
                              
                        </div>
                    </div>
                </div>
                <button type="reset" class="btn btn-outline-danger">Delete</button>
                <div class="float-right">
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#add">Save</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                        Anda ingin memperbarui Status ?
                        </div>
                        <div class="text-center mb-4">
                            <button type="button" class="btn btn-danger mx-2" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary mx-2">Iya</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


@endsection

@section("script")
@endsection