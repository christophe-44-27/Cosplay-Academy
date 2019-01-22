@extends('layout_dashboard')
@push('stylesheets')
    <style>
        .purchases-list{
            text-align: center;
        }
        .purchases-list-header-details{
            width: 250px !important;
        }
        .product-preview-image{
            position: unset !important;
        }
        .text-header{
            line-height: 4em !important;
        }
        .purchase-item-details{
            width: 225px !important;
        }
        .purchases-list-header-price{
            width: 285px !important;
        }
        .purchase-item-price{
            width: 220px;
        }
        .purchase-item-download{
            width: 230px !important;
        }
    </style>
@endpush
@section('content')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
        @include('partials/navigation/bloc_header_navigation_dashboard')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline purchases primary">
                <h4>Vos offres</h4>
            </div>
            <!-- /HEADLINE -->

            <!-- PURCHASES LIST -->
            <div class="purchases-list">
                <!-- PURCHASES LIST HEADER -->
                <div class="purchases-list-header">
                    <div class="purchases-list-header-date">
                        <p class="text-header small">Date</p>
                    </div>
                    <div class="purchases-list-header-details">
                        <p class="text-header small">Image de référence</p>
                    </div>
                    <div class="purchases-list-header-info">
                        <p class="text-header small">Titre de l'offre</p>
                    </div>
                    <div class="purchases-list-header-price">
                        <p class="text-header small">Budget</p>
                    </div>
                    <div class="purchases-list-header-download">
                        <p class="text-header small">Actions</p>
                    </div>
                </div>
                <!-- /PURCHASES LIST HEADER -->
                @if($offers)
                    @foreach($offers as $offer)
                    <!-- PURCHASE ITEM -->
                    <div class="purchase-item">
                        <div class="purchase-item-date">
                            <p>
                                {{ \Carbon\Carbon::parse($offer->desired_delivery_date)->format('d/m/Y')}}
                            </p>
                        </div>
                        <div class="purchase-item-details">
                            <!-- ITEM PREVIEW -->
                            <div class="item-preview">
                                <figure class="product-preview-image small liquid">
                                    <img src="{{ asset('storage/' . $offer->cover_path) }}" alt="product-image">
                                </figure>
                            </div>
                            <!-- /ITEM PREVIEW -->
                        </div>
                        <div class="purchase-item-details">
                            <p class="text-header">{{ $offer->title }}</p>
                        </div>
                        <div class="purchase-item-price">
                            <p class="price"><span>$</span>{{ $offer->max_budget }}</p>
                        </div>
                        <div class="purchase-item-download">
                            <a href="{{ route('commission_show', $offer->slug) }}" target="_blank">Voir</a> -
                            <a href="{{ route('commission_quotations', $offer->id) }}">Candidatures</a>
                        </div>
                    </div>
                    <!-- /PURCHASE ITEM -->
                    @endforeach
                @else
                    <div class="alert alert-info">
                        Vous n'avez pas encore publié d'offres.
                    </div>
                @endif
            </div>
            <!-- /PURCHASES LIST -->
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD BODY -->
@endsection
