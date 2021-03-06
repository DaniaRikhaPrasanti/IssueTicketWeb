@extends('layouts.appuser')
@section("css")
<link rel="stylesheet" href="{{ url("admin") }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ url("admin") }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> --}}
@endsection
@section('contents')

<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <!-- Filter & Add Button -->
            <div class="d-flex justify-content-between my-4" >
                <div class="">
                    <a href="/ticket/create" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Ticket</a>
                </div>
                <div class="">
                    <div class="d-flex justify-content-start">
                        <div class="mx-3">
                            Status
                        </div>
                        <div class="">
                            <div class="btn-group">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    All
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="d-flex justify-content-start">
                        <div class="mx-3">
                            Type
                        </div>
                        <div class="">
                            <div class="btn-group">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    All
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>

          <table id="" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Date</th>
              <th>Subject</th>
              <th>Issue</th>
              <th>Type</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
            <tr>
              <td>{{ $ticket->updated_at}}</td>
              <td>{{ $ticket->Tick_Subj}}</td>
              <td>{{ $ticket->Tick_Issue}}</td>
              <td>{{ $ticket->Tick_Type}}</td>
              <td><button type="button" class="btn
                @if ($ticket->ticket_status_id == 1) btn-danger 
                @elseif ($ticket->ticket_status_id == 2) btn-primary 
                @elseif ($ticket->ticket_status_id == 3) btn-primary 
                @elseif ($ticket->ticket_status_id == 4) btn-primary 
                @elseif ($ticket->ticket_status_id == 5) btn-success 
                @else btn-secondary 
                @endif">{{ $ticket->TicketStatus->status }}</button></td>
              <td>
                <div class="btn-group dropend">
                  <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="/ticket/{{ $ticket->id }}">Detail</a></li>
                    <li>
                      <form action="/ticket/{{ $ticket->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="dropdown-item" onclick="return confirm('Anda ingin menghapus Ticket?')">Delete</button>
                      </form>
                    </li>
                  </ul>
                </div>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>


@endsection

@section("script")
<script src="{{ url("admin") }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url("admin") }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url("admin") }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url("admin") }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

{{-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" ></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js" ></script> --}}

<script>
    $('#myTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
</script>
@endsection
