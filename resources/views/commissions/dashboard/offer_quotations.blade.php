@extends('layout_dashboard')
@push('stylesheets')
@endpush
@section('content')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
    @include('partials/navigation/bloc_header_navigation_dashboard')
    <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline purchases primary">
                <h4>Candidature pour l'offre <b>{{ $offer->title }}</b></h4>
            </div>
            <!-- /HEADLINE -->

            <div class="headline purchases tertiary">
                <h5>Pour voir le contenu complet de la candidature, veuillez cliquer sur sa description.</h5>
            </div>

            <!-- PURCHASES LIST -->
            <div class="purchases-list">
                @if($quotations)
                    <table class="table table-hover">
                        <thead>
                        <th>Reçue le</th>
                        <th>Candidat</th>
                        <th>Description</th>
                        <th>Date de livraison estimée</th>
                        <th>Tarif</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach($quotations as $quotation)
                            <!-- PURCHASE ITEM -->
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($quotation->created_at)->format('d/m/Y')}}</td>
                                <td>
                                    <a href="#" target="_blank">
                                        {{ $quotation->user->public_pseudonym }}
                                    </a>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#quotation-id-{{ $quotation->id }}">
                                        {!! str_limit($quotation->description, $limit = 50, $end = '...') !!}
                                    </a>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($quotation->estimated_delivery_date)->format('d/m/Y')}}</td>
                                <td>{{ $quotation->price }} $</td>
                                <td>
                                    @if($quotation->is_accepted)
                                        <a href="#">Décliner</a>
                                    @else
                                        <a href="#" data-toggle="modal" data-target="#answer-id-{{ $quotation->id }}">Accepter</a>
                                    @endif
                                </td>
                            </tr>
                            <div class="modal fade" id="quotation-id-{{ $quotation->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="quotation-id-{{ $quotation->id }}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                {!! $quotation->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="answer-id-{{ $quotation->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Avertissement</h4>
                                        </div>
                                        <form action="{{ route('commission_quotation_accept') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <p>
                                                    Vous êtes sur le point d'accepter l'offre d'un des cosplayeurs. Afin d'entamer
                                                    la conversation avec lui vous pouvez lui envoyer un message à partir de ce formulaire.
                                                </p>
                                                <p>Néanmoins, sachez qu'il recevra un courriel avec votre adresse courriel Cosplay School. Vérifiez la avant !</p>

                                                <p>(Votre adresse courriel actuelle : <b>{{ $quotation->commission->user->email }})</b></p>
                                                <hr>
                                                <textarea name="answer_quotation" placeholder="Votre réponse ici..."></textarea>
                                                <input type="hidden" name="commission_quotation_id" value="{{ $quotation->id }}"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /PURCHASE ITEM -->
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="headline purchases dark">
                        <h5>Vous n'avez pas encore reçu de candidature concernant cette offre.</h5>
                    </div>
            @endif
            <!-- /PURCHASES LIST HEADER -->
            </div>
            <!-- /PURCHASES LIST -->
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD BODY -->
@endsection
