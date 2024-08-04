@extends('dashboard.layouts.parent')

@section('title', 'All Trainers')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trainers as $trainer)
                            <tr>
                                <td>{{ @$loop->iteration }}</td>
                                <td>{{ $trainer->name }}</td>
                                <td>{{ $trainer->job_title }}</td>
                                <td>{{ $trainer->location }}</td>
                                <td>{{ \Carbon\Carbon::parse($trainer->birth_date)->age }}</td>
                                <td>{{ $trainer->email }}</td>
                                <td>{{ $trainer->phone }}</td>
                                <td>
                                    <a href="{{ route('dashboard.trainers.show', $trainer->id) }}"
                                        class="btn btn-info">Show</a>
                                    <a href="{{ route('dashboard.trainers.edit', $trainer->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteModal{{ $trainer->id }}">Delete</button>
                                </td>
                            </tr>
                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal{{ $trainer->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete {{ '  ' . $trainer->name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('dashboard.trainers.destroy', $trainer->id) }}"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="8">Nothing to Show...</td>
                            </tr>
                        @endforelse

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{-- {{ $trainers->withQueryString()->links() }} --}}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="/dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/dashboard/plugins/jszip/jszip.min.js"></script>
    <script src="/dashboard/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/dashboard/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/dashboard/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/dashboard/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
    </script>
@endsection
