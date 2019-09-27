@extends('layout.layout_dashboard')

@section('content')

    <!-- Content -->
    <div class="row">

        <!-- Item -->
        <div class="col-lg-4 col-md-6">
            <div class="dashboard-stat color-1">
                <div class="dashboard-stat-content wallet-totals"><h4>84.50</h4> <span>Withdrawable Balance <strong class="wallet-currency">USD</strong></span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Money-2"></i></div>
            </div>
        </div>
        <!-- Item -->
        <div class="col-lg-4 col-md-6">
            <div class="dashboard-stat color-3">
                <div class="dashboard-stat-content wallet-totals"><h4>245.15</h4> <span>Total Earnings <strong class="wallet-currency">USD</strong></span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Money-Bag"></i></div>
            </div>
        </div>

        <!-- Item -->
        <div class="col-lg-4 col-md-6">
            <div class="dashboard-stat color-2">
                <div class="dashboard-stat-content"><h4>3</h4> <span>Total Orders</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Shopping-Cart"></i></div>
            </div>
        </div>

    </div>

    <div class="row">

        <!-- Invoices -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box invoices with-icons margin-top-20">
                <h4>Derniers gains <div class="comission-taken">Commission: <strong>{{ getenv('FEE_PERCENTAGE') }} %</strong></div></h4>
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
                <h4>Payout History</h4>
                <ul>

                    <li><i class="list-box-icon sl sl-icon-wallet"></i>
                        <strong>$84.50</strong>
                        <ul>
                            <li class="unpaid">Unpaid</li>
                            <li>Period: 02/2019</li>
                        </ul>
                    </li>

                    <li><i class="list-box-icon sl sl-icon-wallet"></i>
                        <strong>$189.20</strong>
                        <ul>
                            <li class="paid">Paid</li>
                            <li>Period: 01/2019</li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>



        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2019 Listeo. All Rights Reserved.</div>
        </div>
    </div>
@endsection
