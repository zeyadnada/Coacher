@extends('dashboard.layouts.parent')

@section('title', 'Show Subscription')

@section('css')
    <style>
        @media print {

            /* Set the print orientation to landscape */
            @page {
                size: landscape;
                margin: 1in;
                /* Adjust the margin as needed */
            }

            /* Optional: Hide elements you don’t want to print */
            .no-print {
                display: none;
            }

            /* Adjust layout for landscape orientation */
            .container-fluid,
            .invoice {
                width: 100%;
                padding: 0;
                margin: 0;
            }

            .invoice {
                /* Adjust any specific styles for the invoice layout here */
            }
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h3>
                                    <b>SUBID: #{{ $subscription->id }}</b>
                                    <small class="float-right">Date:
                                        {{ \Carbon\Carbon::parse($subscription->created_at)->format('d M Y') }}</small>
                                </h3>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.title row -->

                        <br>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 mb-5">
                                <h5 class="mb-3"><b>Personal Info</b></h5>
                                <p class="mb-2"><b>Name:</b> {{ $subscription->name }}</p>
                                <p class="mb-2"><b>Phone:</b> {{ $subscription->whatsapp_phone }}</p>
                                <p class="mb-2"><b>Email:</b> {{ $subscription->email }}</p>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 mb-5">
                                <h5 class="mb-3"><b>Subscription Info</b></h5>
                                <p class="mb-2"><b>Package Name:</b> {{ $subscription->package->title }}</p>
                                <p class="mb-2"><b>Package Duration:</b> {{ $subscription->duration->duration }}</p>

                                <p class="mb-2"><b>Starting Date:</b> {{ $subscription->starting_date }}</p>
                                <p class="mb-2"><b>Ending Date:</b> {{ $subscription->ending_date }}</p>

                                <p class="mb-2">
                                    <b>Trainer:</b>
                                    @if ($subscription->trainer)
                                        {{ $subscription->trainer->name }}
                                    @else
                                        <span class="text-danger fw-bold">No Trainer</span>
                                    @endif
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 mb-5">
                                <h5 class="mb-3"><b>Payment Info</b></h5>
                                <p class="mb-2">
                                    <b>Payment Status:</b>
                                    <span
                                        class="badge {{ $subscription->payment_status == 'Paid' ? 'badge-success' : ($subscription->payment_status == 'Pending' ? 'badge-warning' : 'badge-danger') }}">
                                        {{ $subscription->payment_status }}
                                    </span>
                                </p>
                                <p class="mb-2"><b>Amount Paid:</b> {{ $subscription->amount_paid }}</p>
                                <p class="mb-2"><b>Transaction ID:</b> {{ $subscription->transaction_id }}</p>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.info row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;"
                                    onclick="window.print()">
                                    <i class="fas fa-download"></i> Print
                                </button>
                            </div>
                        </div>

                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
