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
                    <p class="text-header big">{{ $upcomingPrice }} $</p>
                    <div class="sale-data-item-info">
                        <p class="text-header">Prochain paiement</p>
                        <p>Le {{ \Carbon\Carbon::parse($upcomingInvoice)->format('d/m/Y')}}</p>
                    </div>
                </div>
                <!-- /SALE DATA ITEM-->

                <!-- SALE DATA ITEM -->
                <div class="sale-data-item">
                    <div class="sale-data-item-info">
                        <p class="text-header">
                            @if($subscription && $onGracePeriod)
                                <a href="{{ route('subscription_resume') }}">Réactiver fin à mon abonnement</a>
                            @endif

                            @if($subscription && !$onGracePeriod && is_null($subscription->ends_at))
                                <a href="{{ route('subscription_cancel') }}">Mettre fin à mon abonnement</a>
                            @else
                                <p>Votre abonnement est annulé.</p>
                                <p><a href="{{ route('premium_index') }}" class="primary">Reprendre un abonnement</a> </p>
                            @endif
                        </p>
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
                <table class="table table-bordered">
                    <thead>
                        <th>Numéro de souscription</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Montant</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if($invoices)
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->subscription }}</td>
                                    <td>{{ \Carbon\Carbon::createFromTimestamp($invoice->date)->format('d/m/Y')}}</td>
                                    <td>{{ $invoice->status }}</td>
                                    <td>{{ $invoice->total / 100 }} $</td>
                                    <td>
                                        <a href="{{ $invoice->invoice_pdf }}" target="_blank" class="category secondary">
                                            Télécharger la facture
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <div class="alert alert-info">
                                Vous n'êtes pas abonné à la boîte à cosplay. <a href="{{ route('subscriptions') }}">Jetez-y un coup d'oeil :)</a>
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /TRANSACTION LIST -->
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
@endsection
