@extends('layout.layout_dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div id="add-listing">
            {!! Form::model($tutorial, ['method' => 'post', 'url' => route('tutorial_create', $tutorial), 'enctype' => 'multipart/form-data']) !!}
                <!-- Section -->
                <div class="add-listing-section">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> Informations générales</h3>
                    </div>

                    <!-- Title -->
                    <div class="row with-forms">
                        <div class="col-md-6">
                            <h5>Titre <i class="tip" data-tip-content="Exemple : Création d'une armure en worbla"></i></h5>
                            {!! Form::text('title', $tutorial->title, ['class' => 'search-field'])!!}
                        </div>
                        <div class="col-md-6">
                            <h5>Type de tutoriel </h5>
                            {!! Form::select('type_id', $types, $tutorial->type_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="row with-forms">
                        <!-- Status -->
                        <div class="col-md-6">
                            <h5>Catégorie</h5>
                            {!! Form::select('category_id', $tutorialCategories, $tutorial->category_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>

                        <!-- Type -->
                        <div class="col-md-6">
                            <h5>Mots clés <i class="tip" data-tip-content="Afin d'améliorer le référencement de vos tutoriels, vous pouvez ajouter 10 mots clés différents."></i></h5>
                            <input type="text" placeholder="Les mots clés doivent être séparés par des virgules.">
                        </div>
                    </div>
                    <!-- Row / End -->

                    <!-- Row -->
                    <div class="row with-forms">
                        <!-- Status -->
                        <div class="col-md-6">
                            <h5>Vidéo du tutoriel</h5>
                            {!! Form::file('video_tutorial') !!}
                        </div>
                    </div>
                    <!-- Row / End -->

                </div>
                <!-- Section / End -->

                <!-- Section -->
                <div class="add-listing-section margin-top-45">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-docs"></i> Details</h3>
                    </div>

                    <!-- Description -->
                    <div class="form">
                        <h5>Description</h5>
                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- Youtube -->
                            <div class="col-md-6">
                                <h5 class="youtube-input"><i class="fa fa-youtube-square"></i> Miniature</h5>
                                {!! Form::file('thumbnail_picture', $tutorial->thumbnail_picture)!!}
                            </div>
                        </div>
                        <!-- Row / End -->
                    </div>

                    <!-- Row -->
                    <div class="row with-forms">
                        <!-- Youtube -->
                        <div class="col-md-4">
                            <h5 class="youtube-input"><i class="fa fa-youtube-square"></i> Vidéo du tutoriel <span>(Youtube)</span></h5>
                            {!! Form::text('url_video', $tutorial->url_video, ['placeholder' => 'https://www.youtube.com'])!!}
                        </div>
                    </div>
                    <!-- Row / End -->
                </div>
                <!-- Section / End -->


                <!-- Section -->
                <div class="add-listing-section margin-top-45">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-book-open"></i> Documents joints</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="notification warning margin-bottom-30">
                                <p>Vous devez enregistrer votre tutoriel avant de pouvoir ajouter des documents joints.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Section / End -->

                <!-- Section -->
                <div class="add-listing-section margin-top-45">
                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-picture"></i> Gallery</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="notification warning margin-bottom-30">
                                <p>Vous devez enregistrer votre tutoriel avant de pouvoir ajouter des images.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Section / End -->

                <button type="submit" class="button preview">Enregistrer <i class="fa fa-arrow-circle-right"></i></button>
                {!! Form::close() !!}
            </div>
        </div>

        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2019 Listeo. All Rights Reserved.</div>
        </div>

    </div>
@endsection
