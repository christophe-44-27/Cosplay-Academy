@extends('layout_dashboard')
@section('content')
    <div class="dashboard-body">
        <!-- DASHBOARD HEADER -->
        @include('partials/navigation/bloc_header_navigation_dashboard')
        <!-- DASHBOARD HEADER -->

        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- SALE DATA -->
            <div class="sale-data">
                <!-- SALE DATA ITEM -->
                <div class="sale-data-item">
                    <span class="sl-icon icon-credit-card"></span>
                    <p class="text-header big">29.99</p>
                    <div class="sale-data-item-info">
                        <p class="text-header">Dernier paiement</p>
                        <p>Effectué</p>
                    </div>
                </div>
                <!-- /SALE DATA ITEM-->

                <!-- SALE DATA ITEM -->
                <div class="sale-data-item">
                    <span class="sl-icon icon-credit-card"></span>
                    <p class="text-header big">{{ $upcomingPrice }} $</p>
                    <div class="sale-data-item-info">
                        <p class="text-header">Prochain paiement</p>
                        <p>Le {{ \Carbon\Carbon::parse($upcomingInvoice)->format('d/m/Y')}}</p>
                    </div>
                </div>
                <!-- /SALE DATA ITEM-->

                <!-- SALE DATA ITEM -->
                <div class="sale-data-item"><div class="sale-data-item-info">
                        <p class="text-header">Mettre fin à mon abonnement</p>
                    </div>
                </div>
                <!-- /SALE DATA ITEM-->

                <!-- SALE DATA ITEM -->
                <div class="sale-data-item"></div>
                <!-- /SALE DATA ITEM-->
            </div>
            <!-- /SALE DATA -->

            <!-- TRANSACTION LIST -->
            <div class="transaction-list">
                <!-- TRANSACTION LIST HEADER -->
                <div class="transaction-list-header">
                    <div class="transaction-list-header-author">
                        <p class="text-header small">Numéro de souscription</p>
                    </div>
                    <div class="transaction-list-header-date">
                        <p class="text-header small">Date</p>
                    </div>
                    <div class="transaction-list-header-detail">
                        <p class="text-header small">Status</p>
                    </div>
                    <div class="transaction-list-header-price">
                        <p class="text-header small">Prix</p>
                    </div>
                    <div class="transaction-list-header-item">
                        <p class="text-header small">Actions</p>
                    </div>
                </div>
                <!-- /TRANSACTION LIST HEADER -->

                @if($invoices)
                    @foreach($invoices as $invoice)
                        <!-- TRANSACTION LIST ITEM -->
                        <div class="transaction-list-item">
                            <div class="transaction-list-item-author">
                                <p class="text-header">
                                    {{ $invoice->subscription }}
                                </p>
                            </div>
                            <div class="transaction-list-item-date">
                                <p>{{ \Carbon\Carbon::createFromTimestamp($invoice->date)->format('d/m/Y')}}</p>
                            </div>
                            <div class="transaction-list-item-detail">
                                <p>{{ $invoice->status }}</p>
                            </div>
                            <div class="transaction-list-item-price">
                                <p>{{ $invoice->total / 100 }} $</p>
                            </div>
                            <div class="transaction-list-item-item">
                                <a href="{{ $invoice->invoice_pdf }}" target="_blank" class="category secondary">
                                    Télécharger la facture
                                </a>
                            </div>
                        </div>
                        <!-- /TRANSACTION LIST ITEM -->
                    @endforeach
                @else
                    <div class="alert alert-info">
                        Vous n'êtes pas abonné à la boîte à cosplay. <a href="{{ route('subscriptions') }}">Jetez-y un coup d'oeil :)</a>
                    </div>
                @endif
            </div>
            <!-- /TRANSACTION LIST -->
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
@endsection
