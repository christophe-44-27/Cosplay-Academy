@extends('base_admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Espace d'administration
            <small>Liste des tutoriels</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin_homepage') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active"><a href="{{ route('admin_homepage') }}"><i class="fa fa-dashboard"></i> Liste des
                    tutoriels</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Liste des tutoriels</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                           aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th>ID</th>
                                            <th>Titre</th>
                                            <th>Date de création</th>
                                            <th>Date de publication</th>
                                            <th>Status</th>
                                            <th>Auteur</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($tutorials)
                                            @foreach($tutorials as $tutorial)
                                                <tr role="row">
                                                    <td>{{ $tutorial->id }}</td>
                                                    <td>{{ $tutorial->title }}</td>
                                                    <td>{{ $tutorial->created_at->diffForHumans() }}</td>
                                                    <td>{{ $tutorial->updated_at->diffForHumans() }}</td>
                                                    <td>{{ $tutorial->is_published }}</td>
                                                    <td>{{ $tutorial->user->public_pseudonym }}</td>
                                                    <td>
                                                        @if($tutorial->is_published === 0)
                                                            <a href="{{ route('admin_tutorial_publish', $tutorial->id) }}"
                                                               class="btn btn-success">
                                                                Publier
                                                            </a>
                                                        @else
                                                            <a href="{{ route('admin_tutorial_unpublish', $tutorial->id) }}"
                                                                class="btn btn-warning">
                                                            Dépublier
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <div class="alert alert-danger">
                                                    Aucun tutoriel n'a encore été rédigé.
                                                </div>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
@endsection