@extends('layout.layout_without_search_bar')

@section('content')
    <!--Contact-->
    <div class="sptb bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row text-white">
                        <div class="col-lg-6 col-md-12">
                            <div class="card border-0">
                                <div class="support-service bg-primary">
                                    <i class="fa fa-phone"></i>
                                    <h6>contact@cosplay-academy.ca</h6>
                                    <P>@lang("Support gratuit")</P>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card border-0">
                                <div class="support-service bg-secondary">
                                    <i class="fa fa-clock-o"></i>
                                    <h6>@lang("Lun")-@lang("Dim") (10:00-19:00)</h6>
                                    <p>@lang("Disponibilités")</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Contact-->

    <!--Contact-->
    <div class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6  col-md-12">
                    <div class="map1">
                        <div class="map-header-layer" id="map2"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 col-md-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <form action="{{ route('contact_post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="fullname" placeholder="@lang("Votre nom complet")">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="@lang("Adresse courriel")">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="6" placeholder="@lang("Votre message")"></textarea>
                                </div>
                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Contact-->
@endsection

@push('javascripts')
    <!-- Google Maps js-->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBHDeHhEplb6G1aUgL7U0yANAmmd5INo9o"></script>
    <script src="{{ asset('themes/frontend/plugins/maps-google/jquery.googlemap.js') }}"></script>
    <script src="{{ asset('themes/frontend/plugins/maps-google/map.js') }}"></script>
@endpush
