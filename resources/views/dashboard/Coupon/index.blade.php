@extends('dashboard.layouts.parent')

@section('title', 'All Coupons')

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
                            <th>Code</th>
                            <th>Type</th>
                            <th>value</th>
                            <th>Percentage</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($coupons as $coupon)
                            <tr>
                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->type }}</td>
                                @if ($coupon->type == 'fixed')
                                    <td>{{ $coupon->value }}</td>
                                    <td>0</td>
                                @else
                                    <td>0</td>
                                    <td>{{ $coupon->percent_off }}</td>
                                @endif
                                <td>
                                    <a href="{{ route('dashboard.coupon.edit', ['id' => $coupon->id]) }}"
                                        class="btn btn-warning"><i class="fas fa-solid fa-pen"></i></a>
                                    <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteModal{{ $coupon->id }}"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal{{ $coupon->id }}" tabindex="-1" role="dialog"
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
                                            Are you sure you want to delete {{ '  ' . $coupon->code }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('dashboard.coupon.delete', ['id' => $coupon->id]) }}"
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
                                <td colspan="6">Nothing to Show...</td>
                            </tr>
                        @endforelse

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>value</th>
                            <th>Percentage</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
        {{-- <div class="row">
            <div class="col-12">
                {{ $trainers->withQueryString()->links() }}
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
    <script src="/dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

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
            var trainerId = button.data('id'); // Extract info from data-* attributes
            var formAction = "{{ route('dashboard.trainers.destroy', '') }}/" + trainerId;
            var modal = $(this);
            modal.find('#deleteForm').attr('action', formAction);
        });
    </script>
@endsection
