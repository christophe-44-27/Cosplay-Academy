@extends('base_admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Espace d'administration
            <small>L'école du costume - Cosplay School</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a href="{{ route('admin_homepage') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Espace d'administration</h3>
            </div>
            <div class="box-body">
                L'espace d'administration de l'école du costume permet de modérer les tutoriels et bien plus encore.
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection