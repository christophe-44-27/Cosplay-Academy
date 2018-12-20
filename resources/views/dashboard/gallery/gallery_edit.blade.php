@extends('layout_dashboard')

@section('content')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
    @include('partials/navigation/bloc_header_navigation_dashboard')
    <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline simple primary">
                <h4>Modification de la galerie {{ $gallery->title }}</h4>
            </div>
            <!-- /HEADLINE -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['url' => route('gallery_update', $gallery->slug), 'enctype' => "multipart/form-data"]) !!}
            <div class="form-box-items full">
                <!-- FORM BOX ITEM -->
                <div class="form-box-item full">
                    <h4>Informations générales</h4>
                    <hr class="line-separator">
                    <div>
                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="cover_image" class="rl-label required">Miniature de la galerie</label>
                            <input id="cover_image" type="file" name="cover_image">
                        </div>
                        <!-- /INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <div class="input-container half">
                            <label for="title" class="rl-label required">Titre de la galerie</label>
                            {{ Form::text('title', $gallery->title) }}
                        </div>
                        <!-- /INPUT CONTAINER -->

                        <!-- INPUT CONTAINER -->
                        <div class="input-container half">
                            <label for="url_video" class="rl-label">Sa catégorie</label>
                            {{ Form::select('category_id', $categories) }}
                        </div>
                        <!-- /INPUT CONTAINER -->

                        <div class="clearfix"></div>

                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="content" class="rl-label required">Description</label>
                            {{ Form::text('description', $gallery->description) }}
                        </div>
                        <!-- /INPUT CONTAINER -->
                    </div>
                </div>
                <!-- /FORM BOX ITEM -->

                <!-- FORM BOX ITEM -->
                <div class="form-box-item full">
                    <div>
                        <div class="clearfix"></div>
                        {{ Form::submit('Modifier la galerie', ['class' => 'button big dark']) }}
                    </div>
                </div>
                <!-- /FORM BOX ITEM -->
            </div>
            <div class="clearfix"></div>
            {!! Form::close() !!}
            <div class="clearfix"></div>
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD BODY -->
@endsection
