@extends('layout.layout_dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div id="add-listing">
                <!-- Section -->
                {!! Form::open(['url' => route('dashboard_tutorial_content_store', ['tutorial' => $tutorial, 'session' => $session]), 'enctype' => "multipart/form-data"]) !!}
                <div class="add-listing-section">
                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> Ajout d'un contenu - {{ $tutorial->title }}</h3>
                    </div>


                    <!-- Title -->
                    <div class="row with-forms">
                        <div class="col-md-6">
                            <h5>Nom du contenu <i class="tip" data-tip-content="Le nom ne sera pas affiché publiquement."></i></h5>
                            <input name="name" class="search-field" type="text" value=""/>
                        </div>
                        <div class="col-md-6">
                            <h5>Type de contenu</h5>
                            {!! Form::select('content_type', array('' => "Choisissez un type", 'article' => 'Article', 'video' => 'Vidéo')) !!}
                        </div>
                    </div>
                    <!-- Row -->
                    <div class="row with-forms">
                        <!-- Address -->
                        <div class="col-md-6" id="videoSession">
                            <h5>Fichier vidéo <i class="tip" data-tip-content="La vidéo est hébergée sur Amazon."></i></h5>
                            <input type="file" name="video_session">
                        </div>

                        <!-- City -->
                        <div class="col-md-12" id="articleSession">
                            <div class="form">
                                <h5>Description</h5>
                                {{ Form::textarea('article_content', null, ['class' => 'tinymce']) }}
                            </div>
                        </div>
                    </div>
                    <!-- Row / End -->

                </div>
                <!-- Section / End -->

                <button type="submit" class="button preview">Enregistrer & revenir au cours <i class="fa fa-arrow-circle-right"></i></button>

                <div class="buttons-to-right">
                    <a href="#" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
                </div>

                {!! Form::close() !!}

            </div>
        </div>

        <!-- Copyrights -->
        @include('elements.blocs.dashboard-footer')

    </div>
@endsection

@push('javascripts')
    <script type="text/javascript" src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
    <script>
        $(function() {
            $('textarea.tinymce').tinymce({
                height : "840",
                menubar: false,
                relative_urls : false,
                remove_script_host : false,
                document_base_url : "{{ env('APP_URL') }}",
                plugins: [
                    'image advlist autolink lists link image charmap print preview anchor textcolor',
                    'searchreplace visualblocks code codesample fullscreen',
                    'insertdatetime media table contextmenu paste code help wordcount'
                ],
                codesample_languages: [
                    {text: 'C', value: 'c'},
                    {text: 'C++', value: 'cpp'},
                    {text: 'PHP', value: 'php'}
                ],
                toolbar: 'insert | undo redo | image code codesample | formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | ',
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css'],

                // without images_upload_url set, Upload tab won't show up
                images_upload_url: '{{ route('upload_from_wysiwyg') }}',

                // override default upload handler to simulate successful upload
                images_upload_handler: function(blobInfo, success, failure) {
                    var xhr, formData;
                    var token = $('input[name=_token]').val();

                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', '{{ route('upload_from_wysiwyg') }}');
                    xhr.setRequestHeader("X-CSRF-Token", token);
                    xhr.onload = function() {
                        var json;

                        if (xhr.status != 200) {
                            failure('HTTP Error: ' + xhr.status);
                            return;
                        }

                        json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location != 'string') {
                            failure('Invalid JSON: ' + xhr.responseText);
                            return;
                        }

                        success(json.location);
                    };

                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                    xhr.send(formData);
                },
            });

            $(window).load(function() {

                $("#videoSession").hide();
                $("#articleSession").hide();

                $("select[name='content_type']").change(function(){
                    var selectedOption = $(this).children("option:selected").val();

                    if(selectedOption == 'article')
                    {
                        $("#videoSession").hide();
                        $("#articleSession").show();
                    }

                    if(selectedOption == 'video')
                    {
                        $("#articleSession").hide();
                        $("#videoSession").show();
                    }
                });

                function goBack() {
                    window.history.back();
                }
            });
        });
    </script>
@endpush
