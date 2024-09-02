@extends('dashboard.layouts.parent')

@section('title', 'Payment Configuration')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">WhatsApp Config</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('dashboard.setting.whatsApp.update') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="WHATSAPP_ACCESS_TOKEN">WhatsApp Access Token</label>
                                <textarea name="WHATSAPP_ACCESS_TOKEN" class="form-control" rows="3">{{ env('WHATSAPP_ACCESS_TOKEN') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="WHATSAPP_PHONE_NUMBER_ID">WhatsApp Phone Number ID</label>
                                <input type="text" name="WHATSAPP_PHONE_NUMBER_ID" class="form-control"
                                    value="{{ env('WHATSAPP_PHONE_NUMBER_ID') }}">
                            </div>

                          

                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section> --}}

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">WhatsApp Config</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="whatsAppConfigForm" action="{{ route('dashboard.setting.whatsApp.update') }}"
                            method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="WHATSAPP_ACCESS_TOKEN">WhatsApp Access Token</label>
                                <textarea name="WHATSAPP_ACCESS_TOKEN" class="form-control" rows="3" disabled>{{ env('WHATSAPP_ACCESS_TOKEN') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="WHATSAPP_PHONE_NUMBER_ID">WhatsApp Phone Number ID</label>
                                <input type="text" name="WHATSAPP_PHONE_NUMBER_ID" class="form-control"
                                    value="{{ env('WHATSAPP_PHONE_NUMBER_ID') }}" disabled>
                            </div>

                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </form>

                        <!-- Add the enable button here -->
                        <button id="toggleWhatsAppInputs" class="btn btn-secondary mt-3">Enable</button>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
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
        document.getElementById('toggleWhatsAppInputs').addEventListener('click', function() {
            var inputs = document.querySelectorAll('#whatsAppConfigForm input, #whatsAppConfigForm textarea');
            inputs.forEach(function(input) {
                input.disabled = !input.disabled;
            });

            // Optionally, change the button text based on the current state
            var button = document.getElementById('toggleWhatsAppInputs');
            if (!inputs[0].disabled) {
                button.textContent = 'Disable';
            } else {
                button.textContent = 'Enable';
            }
        });
    </script>
@endsection
