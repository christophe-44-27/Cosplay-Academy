@extends('layout_dashboard')

@section('content')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
    @include('partials/navigation/bloc_header_navigation_dashboard')
    <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline purchases primary">
                <h4>Vos propositions</h4>
            </div>
            <!-- /HEADLINE -->

            <!-- PURCHASES LIST -->
            <div class="purchases-list">
                <!-- /PURCHASES LIST HEADER -->
                @if($quotations)
                    <table class="table table-hover">
                        <thead>
                            <th>Envoyée le</th>
                            <th>Titre de l'offre</th>
                            <th>Description</th>
                            <th>Date de livraison proposée</th>
                            <th>Votre tarif</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                        @foreach($quotations as $quotation)
                            <!-- PURCHASE ITEM -->
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($quotation->created_at)->format('d/m/Y')}}</td>
                                <td>
                                    <a href="{{ route('commission_show', $quotation->commission->slug) }}" target="_blank">
                                        {{ $quotation->commission->title }}
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
                                    @if($quotation->is_accepted == true)
                                        <div class="label label-success">Acceptée</div></a>
                                    @elseif($quotation->is_accepted == false)
                                        <div class="label label-danger">Refusée</div>
                                    @else
                                        <div class="label label-warning">En attente</div>
                                    @endif
                                </td>
                            </tr>
                            <div class="modal fade" id="quotation-id-{{ $quotation->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="quotation-id-{{ $quotation->id }}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Description</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! $quotation->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <!-- /PURCHASE ITEM -->
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="headline purchases dark">
                        <h5>Vous n'avez pas encore reçu de candidature concernant cette offre.</h5>
                    </div>
                @endif
            </div>
            <!-- /PURCHASES LIST -->
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD BODY -->
@endsection
