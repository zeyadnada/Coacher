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
                        <h3 class="card-title">Paymob Gateway</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('dashboard.setting.paymentConfig.update') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="PAYMOB_API_KEY">Paymob API Key</label>
                                <textarea name="PAYMOB_API_KEY" class="form-control" rows="3">{{ env('PAYMOB_API_KEY') }}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="PAYMOB_INTEGRATION_ID">Paymob Card Integration ID</label>
                                <input type="text" name="PAYMOB_CARD_INTEGRATION_ID" class="form-control"
                                    value="{{ env('PAYMOB_CARD_INTEGRATION_ID') }}">
                            </div>

                            <div class="form-group">
                                <label for="PAYMOB_IFRAME_ID">Paymob Card Iframe ID</label>
                                <input type="text" name="PAYMOB_CARD_IFRAME_ID" class="form-control"
                                    value="{{ env('PAYMOB_CARD_IFRAME_ID') }}">
                            </div>

                            <div class="form-group">
                                <label for="PAYMOB_MOBILE_WALLET_INTEGRATION_KEY">Paymob Mobile Wallet Integration
                                    ID</label>
                                <input type="text" name="PAYMOB_MOBILE_WALLET_INTEGRATION_ID" class="form-control"
                                    value="{{ env('PAYMOB_MOBILE_WALLET_INTEGRATION_ID') }}">
                            </div>
                            <div class="form-group">
                                <label for="PAYMOB_HMAC">Paymob HMAC</label>
                                <input type="text" name="PAYMOB_HMAC" class="form-control"
                                    value="{{ env('PAYMOB_HMAC') }}">
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
                        <h3 class="card-title">Paymob Gateway</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="paymentConfigForm" action="{{ route('dashboard.setting.paymentConfig.update') }}" method="POST">
                            @csrf
    
                            <div class="form-group">
                                <label for="PAYMOB_API_KEY">Paymob API Key</label>
                                <textarea name="PAYMOB_API_KEY" class="form-control" rows="3" disabled>{{ env('PAYMOB_API_KEY') }}</textarea>
                            </div>
    
                            <div class="form-group">
                                <label for="PAYMOB_CARD_INTEGRATION_ID">Paymob Card Integration ID</label>
                                <input type="text" name="PAYMOB_CARD_INTEGRATION_ID" class="form-control" value="{{ env('PAYMOB_CARD_INTEGRATION_ID') }}" disabled>
                            </div>
    
                            <div class="form-group">
                                <label for="PAYMOB_CARD_IFRAME_ID">Paymob Card Iframe ID</label>
                                <input type="text" name="PAYMOB_CARD_IFRAME_ID" class="form-control" value="{{ env('PAYMOB_CARD_IFRAME_ID') }}" disabled>
                            </div>
    
                            <div class="form-group">
                                <label for="PAYMOB_MOBILE_WALLET_INTEGRATION_ID">Paymob Mobile Wallet Integration ID</label>
                                <input type="text" name="PAYMOB_MOBILE_WALLET_INTEGRATION_ID" class="form-control" value="{{ env('PAYMOB_MOBILE_WALLET_INTEGRATION_ID') }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="PAYMOB_HMAC">Paymob HMAC</label>
                                <input type="text" name="PAYMOB_HMAC" class="form-control" value="{{ env('PAYMOB_HMAC') }}" disabled>
                            </div>
    
                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </form>
    
                        <!-- Add the enable button here -->
                        <button id="toggleInputs" class="btn btn-secondary mt-3">Enable</button>
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
        document.getElementById('toggleInputs').addEventListener('click', function() {
            var inputs = document.querySelectorAll('#paymentConfigForm input, #paymentConfigForm textarea');
            inputs.forEach(function(input) {
                input.disabled = !input.disabled;
            });
    
            // Optionally, change the button text based on the current state
            var button = document.getElementById('toggleInputs');
            if (!inputs[0].disabled) {
                button.textContent = 'Disable';
            } else {
                button.textContent = 'Enable';
            }
        });
    </script>
@endsection

