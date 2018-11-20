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
                    <p class="text-header big">29.99</p>
                    <div class="sale-data-item-info">
                        <p class="text-header">Prochain paiement</p>
                        <p>Le 02/12/2016</p>
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
                    <div class="transaction-list-header-date">
                        <p class="text-header small">Date</p>
                    </div>
                    <div class="transaction-list-header-author">
                        <p class="text-header small">Adresse courriel</p>
                    </div>
                    <div class="transaction-list-header-item">
                        <p class="text-header small">Plan d'abonnement</p>
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

                <!-- TRANSACTION LIST ITEM -->
                <div class="transaction-list-item">
                    <div class="transaction-list-item-date">
                        <p>Dec 12th, 2014</p>
                    </div>
                    <div class="transaction-list-item-author">
                        <p class="text-header"><a href="">Sarah-Imaginarium</a></p>
                    </div>
                    <div class="transaction-list-item-item">
                        <p class="category primary"><a href="">Westeros Custom Clothing</a></p>
                    </div>
                    <div class="transaction-list-item-detail">
                        <p>Sale</p>
                    </div>
                    <div class="transaction-list-item-price">
                        <p>$ 12</p>
                    </div>
                    <div class="transaction-list-item-item">
                        <p class="category secondary">Voir la facture</p>
                    </div>
                </div>
                <!-- /TRANSACTION LIST ITEM -->
            </div>
            <!-- /TRANSACTION LIST -->
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
@endsection
