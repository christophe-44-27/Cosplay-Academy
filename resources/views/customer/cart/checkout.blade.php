@extends('layout.layout_without_search_bar')

@section('content')
    <section class="sptb">
        <div class="container">
            <div class="row row-cards">
                <div class="col-lg-12">
                    <h2>Votre panier</h2>
                </div>
                <div class="col-lg-8">
                    @include('elements.blocs.notifications')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Payment Method</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-pay">
                                <ul class="tabs-menu nav">
                                    <li class=""><a href="#tab1" class="active" data-toggle="tab"><i class="fa fa-credit-card"></i> @lang("Carte de crédit (Via Stripe)")</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tab1">
                                        <!-- Component Vue JS for payment form -->
                                        <payment-form></payment-form>
                                        <!-- /Component Vue JS for payment form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card ">
                        <div class="card-header ">
                            <div class="card-title">@lang("Résumé du panier")</div>
                        </div>
                        <div class="card-body">
                            @if($items)
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>@lang("Sous-total")</td>
                                            <td class="text-right text-muted">{{ $total }} $</td>
                                        </tr>
                                        <tr>
                                            <td><span>@lang("Taxes (TVQ + TPS)")</span></td>
                                            <td class="text-right text-muted"><span>{{ round($total * 0.14975, 2) }} $</span></td>
                                        </tr>
                                        <tr>
                                            <td><span>@lang("Frais transaction")</span></td>
                                            <td class="text-right text-muted"><span>{{ round($total * 0.0415, 2) + 0.31 }} $</span></td>
                                        </tr>
                                        <tr>
                                            <td><span>@lang("Total (charges incluses)")</span></td>
                                            <td><h2 class="price text-right mb-0"> {{ $total + round($total * 0.14975, 2) + round($total * 0.0415, 2) + 0.31 }} $</h2></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <form class="text-center">
                                    <a href="{{ route('courses') }}" class="btn btn-success mt-2">@lang("Acheter d'autres cours")</a>
                                </form>
                            @else
                                <div class="alert alert-info">Votre panier est vide.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--@if($items)--}}
        {{--<section class="sptb">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="card">--}}
                        {{--<div class="card-body items-gallery">--}}
                            {{--<div class="items-blog-tab text-center">--}}
                                {{--<h2 style="text-align:  left">Autres cours qui pourraient aussi vous intéresser</h2>--}}
                                {{--<div class="tab-content">--}}
                                    {{--<div class="tab-pane active" id="tab-1">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-xl-3 col-lg-6 col-md-12">--}}
                                                {{--<div class="card mb-xl-0">--}}
                                                    {{--<div class="item-card8-img  br-tr-7 br-tl-7">--}}
                                                        {{--<img src="../assets/images/media/7.jpg" alt="img" class="cover-image">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="card-body">--}}
                                                        {{--<div class="item-card8-desc">--}}
                                                            {{--<p class="text-muted">16 November 2018.</p>--}}
                                                            {{--<h4 class="font-weight-semibold">Security Hacking</h4>--}}
                                                            {{--<p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-xl-3 col-lg-6 col-md-12">--}}
                                                {{--<div class="card mb-xl-0">--}}
                                                    {{--<div class="item-card8-img  br-tr-7 br-tl-7">--}}
                                                        {{--<img src="../assets/images/media/2.jpg" alt="img" class="cover-image">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="card-body">--}}
                                                        {{--<div class="item-card8-desc">--}}
                                                            {{--<p class="text-muted">16 November 2018.</p>--}}
                                                            {{--<h4 class="font-weight-semibold">Computer Networking</h4>--}}
                                                            {{--<p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-xl-3 col-lg-6 col-md-12">--}}
                                                {{--<div class="card mb-lg-0">--}}
                                                    {{--<div class="item-card8-img  br-tr-7 br-tl-7">--}}
                                                        {{--<img src="../assets/images/media/11.jpg" alt="img" class="cover-image">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="card-body">--}}
                                                        {{--<div class="item-card8-desc">--}}
                                                            {{--<p class="text-muted">16 November 2018.</p>--}}
                                                            {{--<h4 class="font-weight-semibold">Business Manegement</h4>--}}
                                                            {{--<p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-xl-3 col-lg-6 col-md-12">--}}
                                                {{--<div class="card mb-0">--}}
                                                    {{--<div class="item-card8-img  br-tr-7 br-tl-7">--}}
                                                        {{--<img src="../assets/images/media/1.jpg" alt="img" class="cover-image">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="card-body">--}}
                                                        {{--<div class="item-card8-desc">--}}
                                                            {{--<p class="text-muted">16 November 2018.</p>--}}
                                                            {{--<h4 class="font-weight-semibold">Java Courses</h4>--}}
                                                            {{--<p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="tab-pane" id="tab-2">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-xl-4 col-lg-12 col-md-12">--}}
                                                {{--<div class="card mb-xl-0">--}}
                                                    {{--<div class="item-card8-img  br-tr-7 br-tl-7">--}}
                                                        {{--<img src="../assets/images/media/15.jpg" alt="img" class="cover-image">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="card-body">--}}
                                                        {{--<div class="item-card8-desc">--}}
                                                            {{--<p class="text-muted">16 November 2018.</p>--}}
                                                            {{--<h4 class="font-weight-semibold">UNIX Classes</h4>--}}
                                                            {{--<p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-xl-4 col-lg-12 col-md-12">--}}
                                                {{--<div class="card mb-xl-0">--}}
                                                    {{--<div class="item-card8-img">--}}
                                                        {{--<img src="../assets/images/media/13.jpg" alt="img" class="cover-image">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="card-body">--}}
                                                        {{--<div class="item-card8-desc">--}}
                                                            {{--<p class="text-muted">16 November 2018.</p>--}}
                                                            {{--<h4 class="font-weight-semibold">Frame Works Classes</h4>--}}
                                                            {{--<p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-xl-4 col-lg-12 col-md-12">--}}
                                                {{--<div class="card mb-0">--}}
                                                    {{--<div class="item-card8-img">--}}
                                                        {{--<img src="../assets/images/media/18.jpg" alt="img" class="cover-image">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="card-body">--}}
                                                        {{--<div class="item-card8-desc">--}}
                                                            {{--<p class="text-muted">16 November 2018.</p>--}}
                                                            {{--<h4 class="font-weight-semibold">Digital Marketing</h4>--}}
                                                            {{--<p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="tab-pane" id="tab-3">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-xl-4 col-lg-12 col-md-12">--}}
                                                {{--<div class="card mb-xl-0">--}}
                                                    {{--<div class="item-card8-img  br-tr-7 br-tl-7">--}}
                                                        {{--<img src="../assets/images/media/4.jpg" alt="img" class="cover-image">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="card-body">--}}
                                                        {{--<div class="item-card8-desc">--}}
                                                            {{--<p class="text-muted">16 November 2018.</p>--}}
                                                            {{--<h4 class="font-weight-semibold"> Security Hacking</h4>--}}
                                                            {{--<p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-xl-4 col-lg-12 col-md-12">--}}
                                                {{--<div class="card mb-0">--}}
                                                    {{--<div class="item-card8-img">--}}
                                                        {{--<img src="../assets/images/media/7.jpg" alt="img" class="cover-image">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="card-body">--}}
                                                        {{--<div class="item-card8-desc">--}}
                                                            {{--<p class="text-muted">16 November 2018.</p>--}}
                                                            {{--<h4 class="font-weight-semibold">Marketing Courses</h4>--}}
                                                            {{--<p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--@endif--}}
@endsection

@push('javascripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
