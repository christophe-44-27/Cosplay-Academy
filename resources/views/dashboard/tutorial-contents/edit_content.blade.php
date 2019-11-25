@extends('layout.layout_dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div id="add-listing">
                <!-- Section -->
                {!! Form::open(['method' => 'post', 'url' => route('dashboard_tutorial_update_content', ['tutorial' => $tutorial, 'content' => $content]), 'enctype' => "multipart/form-data"]) !!}
                <div class="add-listing-section">
                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> Modification du contenu - {{ $content->name }}</h3>
                    </div>


                    <!-- Title -->
                    <!-- Row -->
                    <div class="row with-forms">
                        <div class="col-md-4">
                            <h5>Nom du contenu <i class="tip" data-tip-content="Le nom ne sera pas affiché publiquement."></i></h5>
                            {{ Form::text('name', $content->name, ['class' => 'search-field']) }}
                        </div>
                        <div class="col-md-4">
                            <h5>Type de contenu</h5>
                            <select required="required" name="content_type">
                                <option value="">Choisissez un type</option>
                                @foreach ($types as $key => $value)
                                    <option value="{{ $key }}"
                                            @if ($key == old('content_type', $content->type))
                                            selected="selected"
                                        @endif
                                    >{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <h5>@lang('Aperçu gratuit') <i class="tip" data-tip-content="@lang("Ce contenu sera accessible gratuitement même si votre cours est payant. Il permettra à vos clients d'avoir un aperçu de votre cours.")"></i></h5>
                            <input type="checkbox" name="free" class="form-control" {{ ($content->free == true) ? 'checked' : '' }}/>
                        </div>
                    </div>
                    <!-- Row -->
                    <div class="row with-forms">
                        <div id="videoSession">
                            <!-- Address -->
                            <div class="col-md-6">
                                <h5>Fichier vidéo <i class="tip" data-tip-content="La vidéo est hébergée sur Amazon."></i></h5>
                                <input type="file" name="video_session">
                            </div>

                            <!-- Address -->
                            <div class="col-md-6" id="previewVideo">
                                <video style="width: 100%;" controls>
                                    <source src="{{ $url_video }}" type="video/mp4">
                                    Je suis désolé, votre navigateur ne supporte pas les vidéos HTML5
                                    au format WebM avec VP8 ni au format MP4 avec H.264.
                                    <!-- Vous pouvez intégrer un lecteur Flash ici pour lire la vidéo mp4 dans les anciens navigateurs -->
                                </video>
                            </div>

                            <!-- Address -->
                            <div class="col-md-12">
                                <h5>Description de la vidéo <i class="tip" data-tip-content="La description est obligatoire afin de permettre aux malentendants de comprendre le contenu."></i></h5>
                                {{ Form::textarea('video_script', $content->video_script, ['class' => 'tinymce']) }}
                            </div>
                        </div>

                        <!-- City -->
                        <div class="col-md-12" id="articleSession">
                            <div class="form">
                                <h5>Description</h5>
                                {{ Form::textarea('article_content', $content->content_article, ['class' => 'tinymce']) }}
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
                var currentSelectedOption = $("select[name='content_type']").children("option:selected").val();
                disableField(currentSelectedOption);

                $("select[name='content_type']").change(function(){
                    var selectedOption = $(this).children("option:selected").val();
                    disableField(selectedOption);
                });

                function disableField($selectedOption) {
                    if($selectedOption == 'article')
                    {
                        $("#videoSession").hide();
                        $("#articleSession").show();
                        $("#previewVideo").hide();
                    }

                    if($selectedOption == 'video')
                    {
                        $("#articleSession").hide();
                        $("#videoSession").show();
                        $("#previewVideo").show();
                    }
                }

                function goBack() {
                    window.history.back();
                }
            });
        });
    </script>
@endpush
