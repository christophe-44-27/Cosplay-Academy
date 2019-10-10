@extends('layout.layout_without_search_bar')

@section('content')
    <!--User dashboard-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang('Mon tableau de bord')</h3>
                        </div>
                        <div class="card-body text-center item-user border-bottom">
                            <div class="profile-pic">
                                <div class="profile-pic-img">
                                    <span class="bg-success dots" data-toggle="tooltip" data-placement="top" title="online"></span>
                                    @if($user->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}" class="brround" alt="User avatar">
                                    @else
                                        <img src="{{ asset('themes/frontend/images/users/default.jpg') }}" class="brround" alt="user">
                                    @endif
                                </div>
                                <a href="userprofile.html" class="text-dark">
                                    <h4 class="mt-3 mb-0 font-weight-semibold">
                                        {{ $user->name }}
                                    </h4>
                                </a>
                            </div>
                        </div>
                        @include('elements.blocs.user-menu')
                    </div>
                </div>
                <div class="col-xl-9 col-lg-12 col-md-12">
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="card-title">@lang("Factures")</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive border-top">
                                @if($payments->count() > 0)
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>@lang("Numéro de facture")</th>
                                                <th>@lang("Designation")</th>
                                                <th>@lang("Date")</th>
                                                <th>@lang("Prix total")</th>
                                                <th>@lang("Type de paiement")</th>
                                                <th>@lang("Reçu")</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($payments as $payment)
                                                <tr>
                                                    <td class="text-primary">{{ $payment->payment_id }}</td>
                                                    <td>
                                                        {{ $payment->course->title }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::createFromTimeString($payment->created_at)->format('d/m/Y') }}</td>
                                                    <td class="font-weight-semibold fs-16">{{ $payment->amount }} $</td>
                                                    <td class="font-weight-semibold fs-16">{{ $payment->card_brand }} - {{ $payment->last4 }}</td>
                                                    <td>
                                                        <a href="{{ $payment->receipt_url }}" target="_blank" class="badge badge-info">Reçu</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-info" role="alert">
                                        @lang("Vous n'avez encore réalisé aucun achat.")
                                    </div>
                                @endif
                            </div>
                            <ul class="pagination">
                                {{ $payments->links('vendor.pagination.default') }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/User dashboard-->
@endsection
