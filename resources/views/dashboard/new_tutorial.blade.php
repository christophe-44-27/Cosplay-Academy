@extends('layout_dashboard')
@section('content')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
    @include('partials/navigation/bloc_header_navigation_dashboard')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline simple primary">
                <h4>Publier un tutoriel</h4>
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

            {!! Form::open(['url' => route('tutorial_create'), 'enctype' => "multipart/form-data"]) !!}
                <div class="form-box-items full">
                    <!-- FORM BOX ITEM -->
                    <div class="form-box-item full">
                        <h4>Informations générales</h4>
                        <hr class="line-separator">
                        <div>
                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="thumbnail_picture" class="rl-label required">Miniature</label>
                                <input id="thumbnail_picture" type="file" name="thumbnail_picture">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="main_picture" class="rl-label required">Image de couverture (750px x 500px)</label>
                                <input id="main_picture" type="file" name="main_picture">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <div class="clearfix"></div>


                            <!-- INPUT CONTAINER -->
                            <div class="input-container">
                                <label for="title" class="rl-label required">Titre du tutoriel</label>
                                {{ Form::text('title') }}
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="url_video" class="rl-label">Vidéo du cours (facultative)</label>
                                {{ Form::text('url_video', null, ['placeholder' => 'Exemple : https://www.youtube.com/watch?v=6dB1YsDjkck']) }}
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="category" class="rl-label required">Catérogie</label>
                                {{ Form::select('tutorial_category_id', $tutorialCategories) }}
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <div class="clearfix"></div>

                            <!-- INPUT CONTAINER -->
                            <div class="input-container">
                                <label for="content" class="rl-label required">Contenu du tutoriel</label>
                                {{ Form::text('content', null, ['class' => 'tinymce']) }}
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container half">
                                <label for="filename[]" class="rl-label">Source(s) (Taille maximum : 2mo)</label>
                                <div class="input-group control-group increment" >
                                    <input type="file" name="filename[]" class="form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                    </div>
                                </div>
                                <div class="clone hide">
                                    <div class="control-group input-group" style="margin-top:10px">
                                        <input type="file" name="filename[]" class="form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /INPUT CONTAINER -->
                        </div>
                    </div>
                    <!-- /FORM BOX ITEM -->

                    <!-- FORM BOX ITEM -->
                    <div class="form-box-item full">
                        <div>
                            <div class="clearfix"></div>
                            {{ Form::submit('Enregistrer', ['class' => 'button big dark']) }}
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

@push('javascripts')
    <script src="{{ asset('themes/dashboard/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('themes/dashboard/js/tinymce/prism.js') }}"></script>
    <script>
        tinymce.init({
            height : "640",
            menubar: false,
            selector: '.tinymce',
            relative_urls : false,
            remove_script_host : false,
            document_base_url : "http://localhost/cosplayschool-lar/public/",
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
            codesample_dialog_height: 400,
            codesample_dialog_width: 600,
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
    </script>
    <script type="text/javascript">

        $(document).ready(function() {

            $(".btn-success").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){
                $(this).parents(".control-group").remove();
            });

        });

    </script>
@endpush
