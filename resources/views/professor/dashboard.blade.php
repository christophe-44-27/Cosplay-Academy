@extends('layout.layout_dashboard')

@section('content')
    @include('elements.blocs.listeo_notifications')
    <!-- Content -->
    <div class="row">

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-1">
                <div class="dashboard-stat-content"><h4>{{ $nbCours }}</h4> <span>@lang("Mes cours")</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-File"></i></div>
            </div>
        </div>

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-2">
                <div class="dashboard-stat-content"><h4>{{ $nbTutorials }}</h4> <span>@lang("Mes tutoriels")</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-File"></i></div>
            </div>
        </div>


        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-3">
                <div class="dashboard-stat-content"><h4>95</h4> <span>@lang("Avis reçus")</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
            </div>
        </div>

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-4">
                <div class="dashboard-stat-content"><h4>126</h4> <span>@lang("Mis en favoris")</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
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
                <h4>Invoices</h4>
                <ul>

                    <li><i class="list-box-icon sl sl-icon-doc"></i>
                        <strong>Professional Plan</strong>
                        <ul>
                            <li class="unpaid">Unpaid</li>
                            <li>Order: #00124</li>
                            <li>Date: 20/07/2019</li>
                        </ul>
                        <div class="buttons-to-right">
                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                        </div>
                    </li>

                    <li><i class="list-box-icon sl sl-icon-doc"></i>
                        <strong>Extended Plan</strong>
                        <ul>
                            <li class="paid">Paid</li>
                            <li>Order: #00108</li>
                            <li>Date: 14/07/2019</li>
                        </ul>
                        <div class="buttons-to-right">
                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                        </div>
                    </li>

                    <li><i class="list-box-icon sl sl-icon-doc"></i>
                        <strong>Extended Plan</strong>
                        <ul>
                            <li class="paid">Paid</li>
                            <li>Order: #00097</li>
                            <li>Date: 10/07/2019</li>
                        </ul>
                        <div class="buttons-to-right">
                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                        </div>
                    </li>

                    <li><i class="list-box-icon sl sl-icon-doc"></i>
                        <strong>Basic Plan</strong>
                        <ul>
                            <li class="paid">Paid</li>
                            <li>Order: #00091</li>
                            <li>Date: 30/06/2019</li>
                        </ul>
                        <div class="buttons-to-right">
                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>


        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2019 Listeo. All Rights Reserved.</div>
        </div>
    </div>
@endsection
