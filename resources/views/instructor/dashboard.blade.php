@extends('layout.layout_dashboard')

@section('content')
    @include('elements.blocs.listeo_notifications')
    <!-- Content -->
    <div class="row">

        <!-- Item -->
        <div class="col-lg-6 col-md-6">
            <div class="dashboard-stat color-1">
                <div class="dashboard-stat-content"><h4>{{ $nbCours }}</h4> <span>@lang("Mes cours")</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-File"></i></div>
            </div>
        </div>

        <!-- Item -->
        <div class="col-lg-6 col-md-6">
            <div class="dashboard-stat color-2">
                <div class="dashboard-stat-content"><h4>{{ $nbTutorials }}</h4> <span>@lang("Mes tutoriels")</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-File"></i></div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Recent Activity -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box with-icons margin-top-20">
                <h4>@lang("Vos dernières activités")</h4>
                @if(count($userFeeds) > 0)
                    <ul>
                        @foreach($userFeeds as $feed)
                            @switch($feed->type)
                                @case('created_course')
                                    <li>
                                        <i class="list-box-icon sl sl-icon-doc"></i>
                                        Vous avez créé le cours
                                        <strong><a href="#"> {{ ($feed->feedable) ? $feed->feedable->title : ' (cours supprimé)' }}</a></strong> !
                                    </li>
                                    @break
                                @case('updated_course')
                                    <li>
                                        <i class="list-box-icon sl sl-icon-pencil"></i>
                                        Vous avez modifié le cours
                                        <strong><a href="#"> {{ ($feed->feedable) ? $feed->feedable->title : ' (cours supprimé)' }}</a></strong> .
                                    </li>
                                    @break
                                @case('deleted_course')
                                    <li>
                                        <i class="list-box-icon sl sl-icon-trash"></i> Vous avez supprimé un cours.
                                    </li>
                                    @break
                                @case('created_tutorial')
                                    <li>
                                        <i class="list-box-icon sl sl-icon-doc"></i>
                                        Vous avez créé le tutoriel
                                        <strong><a href="#"> {{ ($feed->feedable) ? $feed->feedable->title : ' (tutoriel supprimé)' }}</a></strong> !
                                    </li>
                                    @break
                                @case('updated_tutorial')
                                    <li>
                                        <i class="list-box-icon sl sl-icon-pencil"></i>
                                        Vous avez modifié le tutoriel
                                        <strong><a href="#"> {{ ($feed->feedable) ? $feed->feedable->title : ' (tutoriel supprimé)' }}</a></strong> .
                                    </li>
                                    @break
                                @case('deleted_tutorial')
                                    <li>
                                        <i class="list-box-icon sl sl-icon-trash"></i> Vous avez supprimé un tutoriel.
                                    </li>
                                    @break
                            @endswitch
                        @endforeach
                    </ul>
                @else
                    <div class="row">
                        <div class="col-md-12">
                            <div class="notification warning closeable">
                                <p>@lang("Vous n'avez aucune activité récente sur votre compte.")</p>
                            </div>
                            <div class="alert alert-success"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Invoices -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box invoices with-icons margin-top-20">
                <h4>@lang("Mes derniers revenus")</h4>
                @if($earnings)
                <ul>
                    @foreach($earnings as $earning)
                        <li><i class="list-box-icon sl sl-icon-doc"></i>
                            {{ $earning->earningable->title }} : <strong>{{ round($earning->earningable->price,2) }} $</strong>
                        <ul>
                            <li class="{{ ($earning->paid == true) ? 'paid' : 'unpaid' }}">
                                @if($earning->paid == true)
                                    @lang("Paiement validé")
                                @else
                                    @lang("Paiement en attente")
                                @endif
                            </li>
                            <li>Order: #00124</li>
                            <li>{{ \Illuminate\Support\Carbon::createFromTimeString($earning->created_at)->format('d/m/Y') }}</li>
                        </ul>
                        <div class="buttons-to-right">
                            <a href="{{ route('course_details', $earning->earningable ) }}" target="_blank" class="button gray">@lang("Voir le cours")</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @else
                    <div class="alert alert-info">
                        @lang("Vous n'avez encore perçu aucun revenu mais ça va venir !")
                    </div>
                @endif
            </div>
        </div>


        <!-- Copyrights -->
        @include('elements.blocs.dashboard-footer')
    </div>
@endsection
