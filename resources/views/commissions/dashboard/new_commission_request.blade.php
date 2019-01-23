@extends('layout_dashboard')

@section('content')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
    @include('partials/navigation/bloc_header_navigation_dashboard')
    <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline simple primary">
                <h4>Publier une offre de commission</h4>
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

            {!! Form::open(['url' => route('commission_request_create'), 'enctype' => "multipart/form-data"]) !!}
            <div class="form-box-items full">
                <!-- FORM BOX ITEM -->
                <div class="form-box-item full">
                    <h4>Informations générales</h4>
                    <hr class="line-separator">
                    <div>
                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="cover_path" class="rl-label required">Miniature</label>
                            <input name="cover_path" class="file" type="file" multiple data-show-upload="false" data-show-caption="true">
                        </div>
                        <!-- /INPUT CONTAINER -->

                        <div class="clearfix"></div>


                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="title" class="rl-label required">Titre de de l'offre</label>
                            {{ Form::text('title') }}
                        </div>
                        <!-- /INPUT CONTAINER -->

                        <!-- INPUT CONTAINER -->
                        <div class="input-container half">
                            <label for="delivery_location" class="rl-label">Lieu de livraison</label>
                            {{ Form::text('delivery_location', null, ['placeholder' => 'Ex: Québec, Canada']) }}
                        </div>
                        <!-- /INPUT CONTAINER -->

                        <!-- INPUT CONTAINER -->
                        <div class="input-container half">
                            <label for="max_budget" class="rl-label required">Budget indicatif</label>
                            {{ Form::text('max_budget') }}
                        </div>
                        <!-- /INPUT CONTAINER -->

                        <div class="clearfix"></div>

                        <div class="input-container half">
                            <label>Date de réalisation souhaitée <small>*</small></label>
                            {{ Form::date('desired_delivery_date', \Carbon\Carbon::now()) }}
                        </div>

                        <div class="input-container half">
                            <label>Date de réalisation souhaitée <small>*</small></label>
                            {{ Form::select('category_id', $categories) }}
                        </div>

                        <div class="clearfix"></div>

                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="description" class="rl-label required">Contenu de l'offre</label>
                            {{ Form::text('description', null, ['class' => 'tinymce']) }}
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
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code help wordcount'
            ],
            toolbar: 'insert | undo redo | image code | formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | ',
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
@endpush
