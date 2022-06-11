@extends('layouts.app')
@section('contents')
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
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <th>Issue</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01/10/2022</td>
                    <td>user.name@gmail.com</td>
                    <td>Delay proses</td>
                    <td>Lambung sakit saat belum makan di bulan puasa</td>
                    <td>Question</td>
                </tr>
                <tr>
                    <td>01/10/2022</td>
                    <td>user.name@gmail.com</td>
                    <td>Delay proses</td>
                    <td>Lambung sakit saat belum makan di bulan puasa</td>
                    <td>Question</td>
                </tr>
                <tr>
                    <td>01/10/2022</td>
                    <td>user.name@gmail.com</td>
                    <td>Delay proses</td>
                    <td>Lambung sakit saat belum makan di bulan puasa</td>
                    <td>Question</td>
                </tr>
            </tbody>
          </table>
    </div>

    <div class="card mt-3 mr-2 ml-3 col-sm">
        <div class="row">
            <table class="table col-sm table-hover">
                <tbody>
                  <tr>
                    <th scope="row">
                        <p class="fw-lighter">Resolved</p>
                        <p class="fs-1 mt-2 mb-2 text-success">20</p>
                        <p class="fw-lighter">Ticket already resolved</p>
                    </th>
                  </tr>
                  <tr>
                    <th scope="row">
                        <p class="fw-lighter">Work in Progress</p>
                        <p class="fs-1 mt-2 mb-2 text-info">32</p>
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
                        <p class="fs-1 mt-2 mb-2 text-danger">12</p>
                        <p class="fw-lighter">Tickets are still waiting</p>
                    </th>
                  </tr>
                  <tr>
                    <th scope="row">
                        <p class="fw-lighter">Requested</p>
                        <p class="fs-1 mt-2 mb-2 text-warning">1</p>
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
<script src="{{ url("admin") }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url("admin") }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url("admin") }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url("admin") }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    const labels = [
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
    ];

    const data = {
      labels: labels,
      datasets: [{
        label: 'Jumlah Tiket',
        backgroundColor: 'rgb(58, 120, 238)',
        borderColor: 'rgb(255, 99, 132)',
        data: [0, 10, 5, 2, 20, 45, 100],
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

@endsection


