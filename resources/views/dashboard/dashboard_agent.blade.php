@extends('layouts.app')
@section('contents')
<div class="card mt-3">
    <div class="container-fluid mb-5">
        <h3 class="mt-4">Ticket Statistics</h3>
        <hr>
        <div class="row">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Bar Chart</h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
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
                        <p class="fw-lighter">Resolver</p>
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


