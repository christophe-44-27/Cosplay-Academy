@extends('layout.layout_dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div id="add-listing">
            {!! Form::model($course, ['method' => 'post', 'url' => route('professor_course_create', $course), 'enctype' => 'multipart/form-data']) !!}
                <!-- Section -->
                <div class="add-listing-section">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> Informations générales</h3>
                    </div>

                    <!-- Title -->
                    <div class="row with-forms">
                        <div class="col-md-4">
                            <h5>Titre <i class="tip" data-tip-content="Exemple : Création d'une armure en worbla"></i></h5>
                            {!! Form::text('title', $course->title, ['class' => 'search-field'])!!}
                        </div>
                        <div class="col-md-4">
                            <h5>Type de tutoriel </h5>
                            {!! Form::select('type_id', $types, $course->type_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>
                        <div class="col-md-4">
                            <h5>Pix du cours <i class="tip" data-tip-content="Ne remplir que si vous choisissez premium"></i></h5>
                            {!! Form::text('price', $course->price) !!}
                        </div>
                        <div class="col-md-12">
                            <h5>Description</h5>
                            {!! Form::textarea('content', $course->content)!!}
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="row with-forms">
                        <div class="col-md-4">
                            <h5>Langue</h5>
                            {!! Form::select('language_id', $languages, $course->language_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>
                        <div class="col-md-4">
                            <h5>Niveau</h5>
                            {!! Form::select('difficulty', ['1' => 'Débutant', '2' => "Intermédiaire", '3' => "Expert"]) !!}
                        </div>
                        <!-- Status -->
                        <div class="col-md-4">
                            <h5>Catégorie</h5>
                            {!! Form::select('category_id', $categories, $course->category_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>

                        <!-- Type --><!-- Status -->
                        <div class="col-md-6">
                            <h5>Image du cours <i class="tip" data-tip-content="Directives importantes : 750 x 422 pixels, formats .jpg, .jpeg,. gif ou .png., aucun texte sur l’image."></i></h5>
                            {!! Form::file('course_image') !!}
                        </div>
                        <div class="col-md-6">
                            <h5>Mots clés <i class="tip" data-tip-content="Afin d'améliorer le référencement de vos tutoriels, vous pouvez ajouter 10 mots clés différents."></i></h5>
                            <input name="keywords" type="text" placeholder="Les mots clés doivent être séparés par des virgules.">
                        </div>
                    </div>
                    <!-- Row / End -->
                </div>
                <!-- Section / End -->

                <!-- Section -->
                <div class="add-listing-section margin-top-45">
                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-pencil"></i> Programme</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="notification warning margin-bottom-30">
                                <p>Vous devez enregistrer votre tutoriel avant de pouvoir créer votre programme.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Section / End -->

                <!-- Section -->
                <div class="add-listing-section margin-top-45">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-docs"></i> Documents joints</h3>
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
