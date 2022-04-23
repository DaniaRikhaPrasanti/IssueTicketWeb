@extends('layouts.app')
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
          <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Requester</a>
          <table id="myTable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Jabatan</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>Dian</td>
              <td>Programmer</td>
              <td>dian@gmail.com</td>
              <td>081234567890</td>
              <td>Jl. Kebon Jeruk No.1</td>
              <td>
                <div class="btn-group dropend">
                  <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Edit</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                  </ul>
                </div>
            </tr>
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