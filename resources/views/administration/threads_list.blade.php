@extends('base_admin')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <h3 class="title-5 m-b-35">Les sujets</h3>
            <div class="table-responsive table-responsive-data2">
                @if(count($threads) > 0)
                    <table class="table table-data2">
                        <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Contenu (Extrait)</th>
                            <th>Auteur</th>
                            <th>Catégorie</th>
                            <th>Réponses</th>
                            <th>Créé le</th>
                            <th>Modifié le</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($threads as $thread)
                                <tr class="tr-shadow">
                                    <td>{{ $thread->title }}</td>
                                    <td>
                                        {!! str_limit($thread->body, 50, '...') !!}
                                    </td>
                                    <td class="desc">
                                        {{ $thread->creator->name }}
                                    </td>
                                    <td>
                                        {{ $thread->channel->name }}
                                    </td>
                                    <td>
                                        {{ count($thread->replies) }}
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($thread->created_at)->diffForHumans()}}
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($thread->updated_at)->diffForHumans()}}
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Modérer et ne plus afficher le contenu">
                                                <i class="zmdi zmdi-close-circle"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
                        <i class="zmdi zmdi-time-restore-setting"></i>
                        <span class="content">Aucun sujet à afficher.</span>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
