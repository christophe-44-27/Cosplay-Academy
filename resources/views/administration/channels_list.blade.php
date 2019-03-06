@extends('base_admin')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <h3 class="title-5 m-b-35">Sujets du forum</h3>
            <div class="table-responsive table-responsive-data2">
                @if(count($channels) > 0)
                    <table class="table table-data2">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($channels as $channel)
                                <tr class="tr-shadow">
                                    <td>{{ $channel->name }}</td>
                                    <td>{{ $channel->slug }}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Supprimer la section">
                                                <i class="zmdi zmdi-delete"></i>
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
                        <span class="content">Aucun sujet n'a encore été créé sur le forum.</span>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
