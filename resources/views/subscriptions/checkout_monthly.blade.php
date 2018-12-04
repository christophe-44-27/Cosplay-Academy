@extends('base_layout')

@push('google_analytic')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118215472-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118215472-1');
    </script>
@endpush

@section('content')
    <section class="inner-header bg-black-222">
        <div class="container pt-10 pb-10">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-8 xs-text-center">
                        <h2 class="text-white mt-10">Abonnements</h2>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb white mt-10 text-right xs-text-center">
                            <li><a href="#">Accueil</a></li>
                            <li>Abonnements</li>
                            <li class="active text-gray-silver">Paiement</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container"><div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered tbl-shopping-cart">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Nom du produit</th>
                                <th>Prix unitaire</th>
                                <th>Quantité</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="cart_item">
                                <td class="product-remove"><a title="Remove this item" class="remove" href="#">×</a></td>
                                <td class="product-name"><a href="#">Abonnement mensuel - Le petit cosplayeur</a>
                                    <ul class="variation">
                                        <li class="variation-size">Vous pouvez l'annuler à tout moment.</li>
                                    </ul>
                                </td>
                                <td class="product-price"><span class="amount">29.99</span></td>
                                <td class="product-quantity">
                                    1
                                </td>
                                <td class="product-subtotal"><span class="amount">29.99</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 mt-30">
                    <div class="row">
                        <div class="col-md-6">
                            &nbsp;
                        </div>
                        <div class="col-md-6">
                            <h4>Sous-total du panier</h4>
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>Sous total</td>
                                    <td>29.99$</td>
                                </tr>
                                <tr>
                                    <td>Taxes (TPS + TVQ)</td>
                                    <td>4.49$</td>
                                </tr>
                                <tr>
                                    <td>Frais de paiement</td>
                                    <td>1.30$</td>
                                </tr>
                                <tr>
                                    <td>Total charges comprises</td>
                                    <td>35.80$</td>
                                </tr>
                                </tbody>
                            </table>
                            <a class="btn btn-default">Procéder au paiement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
