@extends('layout.layout_dashboard')

@section('content')
    <div class="row">
        <!-- Invoices -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box invoices with-icons margin-top-20">
                <h4><a href="{{ route('transactions') }}">Derniers gains</a> <div class="comission-taken">Commission: <strong>{{ getenv('FEE_PERCENTAGE') }} %</strong></div></h4>
                @if(count($transactions) > 0)
                    <ul>
                        @foreach($transactions as $transaction)
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
        @include('elements.blocs.dashboard-footer')
    </div>
@endsection
