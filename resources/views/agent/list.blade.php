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
          <a href="/agent/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Agent</a>
          <table id="myTable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Phone Number</th>
              <th>Address</th>
              <th>Team</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($datas as $key=>$value)
            <tr>
              <!-- <td>1</td>
              <td>Dian</td>
              <td>dian@gmail.com</td>
              <td>081234567890</td>
              <td>Jl. Kebon Jeruk No.1</td> -->

              <td>{{ $value->id}}</td>
              <td>{{ $value->Ag_Name}}</td>
              <td>{{ $value->Ag_Email}}</td>
              <td>{{ $value->Ag_Password }}</td>
              <td>{{ $value->Ag_No}}</td>
              <td>{{ $value->Ag_Address}}</td>
              <td>
                @if( $value->Team_Status == 1 )
                      true
                  @else
                      False
                  @endif
              </td>

              <!-- <td class="text-success">True</td> -->
              <td>
                <div class="btn-group dropend">
                  <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                  <li><a href="/agent/{{ $value->id }}" class="dropdown-item">Read</a></li>
                    <li><a class="dropdown-item" href="/agent/{{$value->id}}/edit">Edit</a></li>
                    <li>
                        <form action="/agent/{{ $value->id }}" method="post">
                          @csrf
                          @method('delete')
                          <button class="dropdown-item" onclick="return confirm('Anda ingin menghapus Agen?')">Delete</button>
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