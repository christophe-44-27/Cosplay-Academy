@extends('layout.layout_dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('elements.blocs.listeo_notifications')
            <div id="add-listing">
            {!! Form::model($tutorial, ['method' => 'put', 'url' => route('instructor_tutorial_update', $tutorial), 'enctype' => 'multipart/form-data']) !!}
                <!-- Section -->
                <div class="add-listing-section">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> Contenu du tutoriel</h3>
                    </div>

                    <!-- Title -->
                    <div class="row with-forms">
                        <div class="col-md-4">
                            <h5>Titre <i class="tip" data-tip-content="Exemple : Création d'une armure en worbla"></i></h5>
                            {!! Form::text('title', $tutorial->title, ['class' => 'search-field'])!!}
                        </div>
                        <div class="col-md-4">
                            <h5>Niveau</h5>
                            {!! Form::select('difficulty', ['1' => 'Débutant', '2' => "Intermédiaire", '3' => "Expert"]) !!}
                        </div>
                        <!-- Status -->
                        <div class="col-md-4">
                            <h5>Catégorie</h5>
                            {!! Form::select('category_id', $categories, $tutorial->category_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>
                    </div>

                    <div class="row with-forms">
                        <div class="col-md-6">
                            <h5>Tarification <i class="tip" data-tip-content="Ne remplir que si vous choisissez premium"></i></h5>
                            {!! Form::select('content_price_id', $prices, $tutorial->content_price_id, ['id' => 'content_price_id', 'class' => 'chosen-select-no-single']) !!}
                        </div>

                        <div id="videoAmazon" class="col-md-6">
                            <h5>Fichier vidéo <i class="tip" data-tip-content="La vidéo est hébergée sur Amazon."></i></h5>
                            <input type="file" name="video_session">
                        </div>
                    </div>
                    
                    <div class="row with-forms">
                        <div id="videoYoutube" class="col-md-4">
                            <h5>Lien de votre vidéo <i class="tip" data-tip-content="Exemple : https://www.youtube.com/watch?v=WI0a6xX-fKA (Lien YouTube uniquement)"></i></h5>
                            {!! Form::text('url_video', $tutorial->url_video) !!}
                        </div>
                        <div class="col-md-4">
                            <h5>Langue</h5>
                            {!! Form::select('language_id', $languages, $tutorial->language_id, ['class' => 'chosen-select-no-single']) !!}
                        </div>
                        <div class="col-md-4">
                            <h5>Image du cours <i class="tip" data-tip-content="Directives importantes : 750 x 422 pixels, formats .jpg, .jpeg,. gif ou .png., aucun texte sur l’image."></i></h5>
                            {!! Form::file('thumbnail_picture') !!}
                        </div>
                    </div>

                    <div class="row with-forms">
                        <!-- Type -->
                        <div class="col-md-12">
                            @if($tutorial->thumbnail_picture)
                                @lang("Miniature actuelle")
                                <img src="{{ asset('storage/' . $tutorial->thumbnail_picture) }}">
                            @endif
                        </div>
                    </div>

                    <div class="row with-forms">
                        <div class="col-md-12">
                            <h5>@lang("Contenu écrit du tutoriel")</h5>
                            {!! Form::textarea('content', $tutorial->content, ['id' => 'introduction'])!!}
                        </div>
                    </div>
                </div>
                <!-- Section / End -->

                {!! Form::submit('Enregistrer', ['class' => 'button preview']) !!}
            {!! Form::close() !!}
            </div>
        </div>
        @include('elements.blocs.dashboard-footer')
    </div>
@endsection

@push('javascripts')
    <script src="https://cdn.tiny.cloud/1/flzw58mwpgikw2obj84uuxz5pxn4uceuiubyadhqpcensib0/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#introduction',
        });
    </script>

    <script>
        $(document).ready(function(){
            if($('#content_price_id option:selected').text() === 'Gratuit'){
                $('#videoYoutube').show();
                $('#videoAmazon').hide();
            } else{
                $('#videoYoutube').hide();
                $('#videoAmazon').show();
            }
        });

        $('#content_price_id').change(function(){
            if($('#content_price_id option:selected').text() === 'Gratuit'){
                $('#videoYoutube').show();
                $('#videoAmazon').hide();
            } else{
                $('#videoYoutube').hide();
                $('#videoAmazon').show();
            }
        })
    </script>
@endpush
