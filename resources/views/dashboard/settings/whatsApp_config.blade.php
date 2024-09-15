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
            <div class="col-md-8">
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
                                <textarea name="WHATSAPP_ACCESS_TOKEN" class="form-control" rows="3" readonly>{{ env('WHATSAPP_ACCESS_TOKEN') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="WHATSAPP_PHONE_NUMBER_ID">WhatsApp Phone Number ID</label>
                                <input type="text" name="WHATSAPP_PHONE_NUMBER_ID" class="form-control"
                                    value="{{ env('WHATSAPP_PHONE_NUMBER_ID') }}" readonly>
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
    <script>
        document.getElementById('toggleWhatsAppInputs').addEventListener('click', function() {
            var inputs = document.querySelectorAll('#whatsAppConfigForm input, #whatsAppConfigForm textarea');
            inputs.forEach(function(input) {
                input.readOnly = !input.readOnly;
            });

            // Optionally, change the button text based on the current state
            var button = document.getElementById('toggleWhatsAppInputs');
            if (!inputs[0].readOnly) {
                button.textContent = 'Disable';
            } else {
                button.textContent = 'Enable';
            }
        });
    </script>
@endsection
