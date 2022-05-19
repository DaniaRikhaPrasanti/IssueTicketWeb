@extends('layouts.app')
@section("css")
<link rel="stylesheet" href="{{ url("admin") }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ url("admin") }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('contents')

<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <a href="/requester/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Requester</a>
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
              @foreach ($requests as $requester)
              <tr >
                <td>{{ $loop->iteration }}</td>
                <td>{{ $requester->Req_Name }}</td>
                <td>{{ $requester->Req_Jabatan }}</td>
                <td>{{ $requester->Req_Email }}</td>
                <td>{{ $requester->Comp_No }}</td>
                <td>{{ $requester->Req_No }}</td>
                <td>{{ $requester->Req_Address }}</td>
                <td>
                  <div class="btn-group dropend">
                    <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a href="/requester/{{ $requester->id }}" class="dropdown-item">Read</a>
                      </li>
                      <li>
                        <a href="/requester/{{ $requester->id }}/edit" class="dropdown-item">Edit</a>
                      </li>
                      <li>
                        <form action="/requester/{{ $requester->id }}" method="post">
                          @csrf
                          @method('delete')
                          <button class="dropdown-item" onclick="return confirm('Anda ingin menghapus Requester?')">Delete</button>
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