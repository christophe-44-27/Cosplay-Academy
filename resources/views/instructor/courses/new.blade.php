@extends('layout.layout_dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('elements.blocs.listeo_notifications')
            <div id="add-listing">
            {!! Form::model($course, ['method' => 'post', 'url' => route('professor_course_create', $course), 'enctype' => 'multipart/form-data']) !!}
                <div class="add-listing-section">
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> Informations générales</h3>
                    </div>

                    <div class="row with-forms">
                        <div class="col-md-4">
                            <h5>Titre <i class="tip" data-tip-content="Exemple : Création d'une armure en worbla"></i></h5>
                            {!! Form::text('title', $course->title, ['class' => 'search-field'])!!}
                        </div>

                        <div class="col-md-4">
                            <h5>Tarification <i class="tip" data-tip-content="Ne remplir que si vous choisissez premium"></i></h5>
                            {!! Form::select('content_price_id', $prices, $course->content_price_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>

                        <div class="col-md-4">
                            <h5>Image du cours <i class="tip" data-tip-content="Directives importantes : 750 x 422 pixels, formats .jpg, .jpeg,. gif ou .png., aucun texte sur l’image."></i></h5>
                            {!! Form::file('course_image') !!}
                        </div>

                        <div class="col-md-12">
                            <h5>@lang("Introduction")</h5>
                            {!! Form::textarea('introduction', $course->introduction, ['id' => 'introduction'])!!}
                        </div>
                    </div>

                    <div class="row with-forms">
                        <div class="col-md-4">
                            <h5>Langue</h5>
                            {!! Form::select('language_id', $languages, $course->language_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>

                        <div class="col-md-4">
                            <h5>Niveau</h5>
                            {!! Form::select('difficulty', ['1' => 'Débutant', '2' => "Intermédiaire", '3' => "Expert"]) !!}
                        </div>

                        <div class="col-md-4">
                            <h5>Catégorie</h5>
                            {!! Form::select('category_id', $categories, $course->category_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>
                    </div>
                </div>

                <div class="add-listing-section margin-top-45">
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

                <div class="add-listing-section margin-top-45">
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

@push('javascripts')
    <script src="https://cdn.tiny.cloud/1/flzw58mwpgikw2obj84uuxz5pxn4uceuiubyadhqpcensib0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#introduction'
        });
    </script>
@endpush
