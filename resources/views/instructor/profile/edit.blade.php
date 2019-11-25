@extends('layout.layout_dashboard')
@section('content')
    <div class="row">
        @if(isset($user->stripe_connect_account_id))
            <div class="col-md-12">
                <div class="notification notice">
                    <p>Votre compte de paiement a bien été configuré. Vous pouvez y accéder en cliquant sur le bouton ci-dessous.</p>
                    @if(isset($stripeLoginLink))
                        <a class="button" style="float: unset !important;" href="{{ $stripeLoginLink->url }}" target="_blank">Tableau de bord Stripe</a>
                    @endif
                </div>
            </div>
        @else
            <div class="col-md-12">
                <div class="notification notice">
                    <b>Remarque : </b> Une fois que votre profil aura été rempli, vous allez être redirigé vers le site de Stripe avant de saisir vos
                    coordonnées bancaires en créant votre compte de paiement sur la plateforme Stripe.
                    <p>Ce compte de paiement vous permettra de recevoir les sommes perçues lorsque des membres achèteront vos cours sur la Cosplay Academy.</p>
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-12">
            @include('elements.blocs.listeo_notifications')
            <div id="add-listing">
                @if(isset($professor->id))
                    {!! Form::model($professor, ['method' => 'put', 'url' => route('profile_professor_update', $professor)]) !!}
                @else
                    {!! Form::model($professor, ['method' => 'post', 'url' => route('profile_professor_store')]) !!}
                @endif
                    <!-- Section -->
                    <div class="add-listing-section">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i> @lang("Informations personnelles")</h3>
                        </div>

                        <!-- Title -->
                        <div class="row with-forms">
                            <div class="col-md-6">
                                <h5>@lang("Prénom")<span style="color: red; font-size: 24px">*</span></h5>
                                {!! Form::text('firstname', $professor->firstname, ['class' => 'search-field'])!!}
                            </div>
                            <div class="col-md-6">
                                <h5>@lang("Nom")<span style="color: red; font-size: 24px">*</span></h5>
                                {!! Form::text('lastname', $professor->lastname, ['class' => 'search-field'])!!}
                            </div>
                        </div>

                        <div class="row with-forms">
                            <div class="col-md-6">
                                <h5>@lang("Adresse")<span style="color: red; font-size: 24px">*</span></h5>
                                {!! Form::text('adress', $professor->adress) !!}
                            </div>
                            <div class="col-md-6">
                                <h5>@lang("Code postal")<span style="color: red; font-size: 24px">*</span></h5>
                                {!! Form::text('zip_code', $professor->zip_code) !!}
                            </div>
                        </div>

                        <div class="row with-forms">
                            <div class="col-md-4">
                                <h5>@lang("Ville")<span style="color: red; font-size: 24px">*</span></h5>
                                {!! Form::text('city', $professor->city) !!}
                            </div>
                            <div class="col-md-4">
                                <h5>@lang("Région")<span style="color: red; font-size: 24px">*</span></h5>
                                {!! Form::text('state', $professor->state) !!}
                            </div>
                            <div class="col-md-4">
                                <h5>@lang("Pays")<span style="color: red; font-size: 24px">*</span></h5>
                                {!! Form::select('country_id', $countries, $professor->country_id) !!}
                            </div>
                        </div>
                        <!-- Row / End -->
                    </div>
                    <!-- Section / End -->
                    {!! Form::submit(\Illuminate\Support\Facades\Lang::get('Enregistrer & continuer'), ['class' => 'button preview']) !!}
                {!! Form::close() !!}
            </div>
        </div>

        @include('elements.blocs.dashboard-footer')
    </div>
@endsection
