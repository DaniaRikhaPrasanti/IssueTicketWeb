@extends('layouts.app')
<link rel="stylesheet" href="{{ asset("admin") }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset("admin") }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@section('contents')

<!-- Graph -->
<div class="card mt-3">
    <div class="container-fluid mb-5">
        <h3 class="mt-4">Ticket Statistics</h3>
        <hr>
        <div class="row pl-5 mt-5">
            <div class="chart col-9">
                <canvas id="barChart" class="mr-5" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <div class="col-3 mt-3 mb-5">
                <div class="mb-4">
                    <div class="d-flex justify-content-start">
                        <div class="mr-3">
                            By
                        </div>
                        <div class="">
                            <div class="btn-group">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Bulan
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Hari</a>
                                    <a class="dropdown-item" href="#">Bulan</a>
                                    <a class="dropdown-item" href="#">Tahun</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">Resolved</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">Pending</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">Open</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">Work In Progress</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">Work Done</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">Feature Requested</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Ticket -->
    <div class="card mt-3 mr-3 ml-2 col-sm">
        <div class="container-fluid mb-2">
            <h3 class="mt-4">Recent Tickets</h3>
            <hr>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Requester</th>
                    <th>Subject</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($newticket as $ticket)
                <tr>
                    <td>{{ $ticket->updated_at}}</td>
                    <td>{{ $ticket->Tick_Req}}</td>
                    <td>{{ $ticket->Tick_Subj}}</td>
                    <td>{{ $ticket->Tick_Type}}</td>
                    <td><button type="button" class="btn
                        @if ($ticket->ticket_status_id == 1) btn-danger
                        @elseif ($ticket->ticket_status_id == 2) btn-primary
                        @elseif ($ticket->ticket_status_id == 3) btn-primary
                        @elseif ($ticket->ticket_status_id == 4) btn-primary
                        @elseif ($ticket->ticket_status_id == 5) btn-success
                        @else btn-secondary
                        @endif">{{ $ticket->TicketStatus->status }}
                    </button>
                    </td>
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
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
    </div>


    <!-- Ticket Count -->
    <div class="card mt-3 mr-2 ml-3 col-sm">
        <div class="row">
            <table class="table col-sm table-hover">
                <tbody>
                  <tr>
                    <th scope="row">
                        <p class="fw-lighter">Resolved</p>
                        <p class="fs-1 mt-2 mb-2 text-success">{{ $resolvedcount }}</p>
                        <p class="fw-lighter">Ticket already resolved</p>
                    </th>
                  </tr>
                  <tr>
                    <th scope="row">
                        <p class="fw-lighter">Work in Progress</p>
                        <p class="fs-1 mt-2 mb-2 text-info">{{ $wipcount }}</p>
                        <p class="fw-lighter">Tickets are being reviewed</p>
                    </th>
                  </tr>
                </tbody>
            </table>
            <table class="table col-sm table-hover">
                <tbody>
                  <tr>
                    <th scope="row">
                        <p class="fw-lighter">Pending</p>
                        <p class="fs-1 mt-2 mb-2 text-danger">{{ $pendingcount }}</p>
                        <p class="fw-lighter">Tickets are still waiting</p>
                    </th>
                  </tr>
                  <tr>
                    <th scope="row">
                        <p class="fw-lighter">Requested</p>
                        <p class="fs-1 mt-2 mb-2 text-warning">{{ $requestedcount }}</p>
                        <p class="fw-lighter">Ticket feature are requested</p>
                    </th>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection

@section("script")
<script src="{{ asset("admin") }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset("admin") }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset("admin") }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset("admin") }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

    const labels = <?php echo json_encode($namabulan) ?>;

    const data = {
      labels: labels,
      datasets: [{
        label: 'Jumlah Tiket',
        backgroundColor: 'rgb(58, 120, 238)',
        borderColor: 'rgb(255, 99, 132)',
        data: <?php echo json_encode($ticketperbulan) ?>,
      }]
    };

    const config = {
      type: 'bar',
      data: data,
      options: {}
    };
</script>

<script>
    const barChart = new Chart(
      document.getElementById('barChart'),
      config
    );
  </script>

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


