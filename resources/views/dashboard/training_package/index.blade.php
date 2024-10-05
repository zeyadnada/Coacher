@extends('dashboard.layouts.parent')

@section('title', 'All Training packages')

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
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Durations</th>
                            <th>Prices</th>
                            <th>Discount Prices</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($packages as $package)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $package->title }}</td>
                                <td colspan="3">
                                    @if ($package->durations->isNotEmpty())
                                        @foreach ($package->durations as $duration)
                                            <div>
                                                <strong>Duration:</strong> {{ $duration->duration }} |
                                                <strong>Price:</strong> {{ $duration->price }} |
                                                <strong>Discount Price:</strong>
                                                {{ $duration->discount_price ?? $duration->price }}
                                            </div>
                                        @endforeach
                                    @else
                                        <div>No durations available</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.training-packages.show', $package->id) }}"
                                        class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('dashboard.training-packages.edit', $package->id) }}"
                                        class="btn btn-warning"><i class="fas fa-solid fa-pen"></i></a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"
                                        data-id="{{ $package->id }}"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Nothing to Show...</td>
                            </tr>
                        @endforelse --}}
                        @forelse ($packages as $package)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $package->title }}</td>
                                <td>
                                    @foreach ($package->durations as $duration)
                                        <div>{{ $duration->duration }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($package->durations as $duration)
                                        <div>{{ $duration->price }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($package->durations as $duration)
                                        <div>{{ $duration->discount_price ?? $duration->price }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.training-packages.show', $package->id) }}"
                                        class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('dashboard.training-packages.edit', $package->id) }}"
                                        class="btn btn-warning"><i class="fas fa-solid fa-pen"></i></a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"
                                        data-id="{{ $package->id }}"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Nothing to Show...</td>
                            </tr>
                        @endforelse

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Durations</th>
                            <th>Prices</th>
                            <th>Discount Prices</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <form id="deleteForm" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Delete Confirmation Modal -->

            </div>
        </div>
        {{-- <div class="row">
            <div class="col-12">
                {{ $packages->withQueryString()->links() }}
            </div>
        </div> --}}
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
    <script src="/dashboard//plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "lengthChange": false,
                "responsive": true,
                "autoWidth": false,
                "paging": true,
                "searching": true,
                "buttons": [{
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible' // Only export visible columns
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible' // Only export visible columns
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible' // Only print visible columns
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible' // Only export visible columns
                        }
                    },
                    'colvis' // Column visibility button
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var packageId = button.data('id'); // Extract info from data-* attributes
            var formAction = "{{ route('dashboard.training-packages.destroy', '') }}/" + packageId;
            var modal = $(this);
            modal.find('#deleteForm').attr('action', formAction);
        });
    </script>
@endsection
