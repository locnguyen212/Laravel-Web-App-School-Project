@extends('admin.master')
@section('title', 'Feedback List')
@section('module', 'Feedback')
@section('action', 'List')

@push('css')
<!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('administrator/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('administrator/dist/css/adminlte.min.css') }}">
@endpush

@push('js')
    <!-- jQuery -->
    <script src="{{ asset('administrator/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('administrator/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('administrator/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('administrator/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('administrator/dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });

    function acceptDelete () {
        if (window.confirm("Are You Sure ?")) {
            return true;
        }

        return false;
    }
    </script>
@endpush

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Application</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
            </div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Feedback List</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Origami</th>
                                <th>Content</th>
                                <th>Admin In Charge</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Relay</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($data as $data)
                               
                                <tr>  
                                    <td>{{ $loop->iteration }}</td>

                                    <td> {{ $data->name }} </td> 

                                    <td> {{ $data->email }} </td>

                                    <td> {{ $data->origami_name }} </td>

                                    <td> {{ $data->content }} </td> 
                                    
                                    <td> {{ $data->user_name }} </td>

                                    @if ($data->status == 1)
                                        <td>Not Approved</td>
                                    @elseif($data->status == 2)
                                        <td>Approved</td>
                                    @endif
                                    
                                    @livewire('approve', ['status' => $data->status, 'feedback_id' => $data->id])

                                    

                                    <td><a href="{{ route('admin.feedback.destroy', ['id' => $data->id]) }}" onclick="return acceptDelete()">Delete</a></td>   
                                    @if ($data->status == 2 && $data->parent_id == 0 )
                                    <td><a href="{{ route('admin.feedback.replay', ['id' => $data->id]) }}" >Replay</a></td> 
                                    @endif    
                                    <td></td>
                                </tr>
                            
                            
                            @endforeach
                        </tbody>
                    </table>
                </div> 
        </div>
    </div>
    <!-- /.card -->
@endsection