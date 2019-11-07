@extends('layout.layout_dashboard')

@section('content')
    <div class="row">
        <!-- Invoices -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box invoices with-icons margin-top-20">
                <h4>@lang("Revenus") <div class="comission-taken">@lang("Commission"): <strong>{{ getenv('FEE_PERCENTAGE') }} %</strong></div></h4>
                @if(count($earnings) > 0)
                    <ul>
                        @foreach($earnings as $earning)
                            <li><i class="list-box-icon sl sl-icon-basket"></i>
                                @if(isset($earning->course))
                                    <strong>{{ $earning->course->title }}</strong>
                                @endif
                                <ul>
                                    <li class="paid">$ {{ $earning->amount }}</li>
                                    <li class="unpaid">Commission: $ {{ $earning->amount * (getenv('FEE_PERCENTAGE') / 100) }} </li>
                                    <li class="unpaid">Frais Stripe: $ {{ $earning->amount * (getenv('FEE_STRIPE') / 100) + getenv('FEE_STRIPE_CENT') }}</li>
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
            <div class="row">
                <div class="col-sm-12">
                    <nav>
                        {{ $earnings->links('vendor.pagination.default') }}
                    </nav>
                </div>
            </div>
        </div>

        <!-- Copyrights -->
        @include('elements.blocs.dashboard-footer')
    </div>
@endsection
