@extends('layout.layout_dashboard')

@section('content')

    <!-- Content -->
    <div class="row">

        <!-- Item -->
        <div class="col-lg-6 col-md-6">
            <div class="dashboard-stat color-1">
                <div class="dashboard-stat-content wallet-totals"><h4>84.50</h4> <span>@lang("Vos gains de la semaine") <strong class="wallet-currency">CAD</strong></span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Money-2"></i></div>
            </div>
        </div>
        <!-- Item -->
        <div class="col-lg-6 col-md-6">
            <div class="dashboard-stat color-3">
                <div class="dashboard-stat-content wallet-totals"><h4>245.15</h4> <span>@lang("Vos gains de l'année (2019)") <strong class="wallet-currency">CAD</strong></span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Money-Bag"></i></div>
            </div>
        </div>

    </div>

    <div class="row">

        <!-- Invoices -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box invoices with-icons margin-top-20">
                <h4><a href="{{ route('transactions') }}">Derniers gains</a> <div class="comission-taken">Commission: <strong>{{ getenv('FEE_PERCENTAGE') }} %</strong></div></h4>
                @if(count($lastTransactions) > 0)
                    <ul>
                        @foreach($lastTransactions as $transaction)
                            <li><i class="list-box-icon sl sl-icon-basket"></i>
                                @if(isset($transaction->course))
                                    <strong>{{ $transaction->course->title }}</strong>
                                @endif
                                <ul>
                                    <li class="paid">$ {{ $transaction->amount }}</li>
                                    <li class="unpaid">Commission: $ {{ $transaction->amount * (getenv('FEE_PERCENTAGE') / 100) }} </li>
                                    <li class="unpaid">Frais Stripe: $ {{ $transaction->amount * (getenv('')) }}</li>
                                    <li class="paid">Gain net: <span>$84.50</span></li>
                                    <li>Order: #00124</li>
                                    <li>Date: 01/02/2019</li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="row">
                        <div class="col-md-12">
                            <div class="notification notice margin-bottom-30">
                                <p>Vous n'avez encore reçu aucun gain, patience ça va venir !</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Invoices -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box invoices with-icons margin-top-20">
                <h4>@lang("Historique de paiement")</h4>
                <ul>
                    @if($lastTransactions)
                        @foreach($lastTransactions as $lastTransaction)
                            <li><i class="list-box-icon sl sl-icon-wallet"></i>
                                <strong>{{ $lastTransaction->amount }} $</strong>
                                <ul>
                                    <li class="{{ ($lastTransaction->paid == true) ? 'paid' : 'unpaid'}}">{{ ($lastTransaction->paid == true) ? 'Payée' : 'Impayée'}}</li>
                                    <li><a href=" {{ $lastTransaction->receipt_url }}">@lang("Télécharger la facture")</a></li>
                                </ul>
                            </li>
                        @endforeach
                    @else
                        <div class="notification notice margin-bottom-30">
                            <p>Vous n'avez effectué aucun paiement.</p>
                        </div>
                    @endif
                </ul>
            </div>
        </div>



        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2019 Listeo. All Rights Reserved.</div>
        </div>
    </div>
@endsection
