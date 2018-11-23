@extends('layout_dashboard')

@push('stylesheets')
    <style>
        .share-links li a.yt {
            background-image: url({{ asset('themes/dashboard/images/yt.png') }}) !important;
            background-color: #cd201e !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
        }

        .share-links li a.insta {
            background-image: url({{ asset('themes/dashboard/images/insta.png') }}) !important;
            background-color: #ef4178 !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
        }

        .share-links li a.web {
            background-image: url({{ asset('themes/dashboard/images/web.png') }}) !important;
            background-color: #00d7b3 !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
        }
    </style>
@endpush

@section('content')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
        @include('partials/navigation/bloc_header_navigation_dashboard')

        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            {!! Form::open(['url' => route('my_account_update'), 'enctype' => "multipart/form-data"]) !!}

            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>Mettre à jour mon compte</h4>
            </div>
            <!-- /HEADLINE -->
            <!-- FORM BOX ITEMS -->
            <div class="form-box-items">
                <!-- FORM BOX ITEM -->
                <div class="form-box-item">
                    <h4>Mes informations personnelles</h4>
                    <hr class="line-separator">
                    <!-- PROFILE IMAGE UPLOAD -->
                    <div class="input-container">
                        <div class="profile-image">
                            <div class="profile-image-data">
                                <figure class="user-avatar user-avatar-profile medium">
                                    @if($user->profile_picture)
                                        <img src="{{ asset('storage/' . $user->profile_picture ) }}"
                                             alt="profile-default-image">
                                    @else
                                    <img src="{{ asset('themes/dashboard/images/dashboard/profile-default-image.png') }}"
                                         alt="profile-default-image">
                                    @endif
                                </figure>
                                <p class="text-header">Ma photo de profil <span class="required">*</span></p>
                                <p class="upload-details">Taille minimum 70px x 70px</p>
                                <input type="file" name="profile_picture">
                            </div>
                        </div>
                    </div>
                    <!-- PROFILE IMAGE UPLOAD -->

                    <!-- PROFILE IMAGE UPLOAD -->
                    <div class="input-container">
                        <div class="profile-image">
                            <div class="profile-image-data">
                                <figure class="user-avatar user-avatar-profile medium">
                                    @if($user->cover_picture)
                                        <img src="{{ asset('storage/' . $user->cover_picture ) }}"
                                             alt="profile-default-image">
                                    @else
                                        <img src="{{ asset('themes/dashboard/images/dashboard/profile-default-image.png') }}"
                                             alt="profile-default-image">
                                    @endif
                                </figure>
                                <p class="text-header">Ma photo de couverture <span class="required">*</span></p>
                                <p class="upload-details">Taille minimum 1265px x 300px</p>
                                <input type="file" name="cover_picture">
                            </div>
                        </div>
                    </div>
                    <!-- PROFILE IMAGE UPLOAD -->

                    <br>
                    <br>

                    <!-- INPUT CONTAINER -->
                    <div class="input-container">
                        <label for="acc_name" class="rl-label required">Pseudonyme public</label>
                        {{ Form::text('public_pseudonym', $user->public_pseudonym) }}
                    </div>
                    <!-- /INPUT CONTAINER -->

                    <!-- INPUT CONTAINER -->
                    <div class="input-container">
                        <label for="about" class="rl-label">Ma description</label>
                        {{ Form::text('description', $user->description, ['class' => 'tinymce']) }}
                    </div>
                    <!-- /INPUT CONTAINER -->

                    <!-- INPUT CONTAINER -->
                    <div class="input-container half">
                        <label for="firstname" class="rl-label required">Prénom</label>
                        {{ Form::text('firstname', $user->firstname) }}
                    </div>
                    <!-- /INPUT CONTAINER -->

                    <!-- INPUT CONTAINER -->
                    <div class="input-container half">
                        <label for="lastname"
                               class="rl-label required">Nom</label>
                        {{ Form::text('lastname', $user->lastname) }}
                    </div>
                    <!-- /INPUT CONTAINER -->

                    <!-- INPUT CONTAINER -->
                    <div class="input-container">
                        <label for="new_email" class="rl-label required">Email</label>
                        {{ Form::text('email', $user->email) }}
                    </div>
                    <!-- /INPUT CONTAINER -->
                </div>
                <!-- /FORM BOX ITEM -->

                <!-- FORM BOX ITEM -->
                <div class="form-box-item spaced">
                    <h4>Mes réseaux sociaux</h4>
                    <hr class="line-separator">

                    <!-- INPUT CONTAINER -->
                    <div class="input-container">
                        <ul class="share-links">
                            <li>
                                <a href="#" class="fb"></a>
                            </li>
                        </ul>
                        {{ Form::text('facebook_page', $user->facebook_page) }}
                    </div>
                    <!-- /INPUT CONTAINER -->

                    <!-- INPUT CONTAINER -->
                    <div class="input-container">
                        <ul class="share-links">
                            <li>
                                <a href="#" class="yt"></a>
                            </li>
                        </ul>
                        {{ Form::text('youtube_page', $user->youtube_page) }}
                    </div>
                    <!-- /INPUT CONTAINER -->

                    <!-- INPUT CONTAINER -->
                    <div class="input-container">
                        <ul class="share-links">
                            <li>
                                <a href="#" class="twt"></a>
                            </li>
                        </ul>
                        {{ Form::text('twitter_page', $user->twitter_page) }}
                    </div>
                    <!-- /INPUT CONTAINER -->

                    <!-- INPUT CONTAINER -->
                    <div class="input-container">
                        <ul class="share-links">
                            <li>
                                <a href="#" class="insta"></a>
                            </li>
                        </ul>
                        {{ Form::text('instagram_page', $user->instagram_page) }}
                    </div>
                    <!-- /INPUT CONTAINER -->

                    <!-- INPUT CONTAINER -->
                    <div class="input-container">
                        <ul class="share-links">
                            <li><a href="#" class="web"></a></li>
                        </ul>
                        {{ Form::text('website', $user->website) }}
                    </div>
                    <!-- /INPUT CONTAINER -->
                </div>
                <!-- /FORM BOX ITEM -->
            </div>
            <!-- /FORM BOX ITEMS -->

            <!-- FORM BOX ITEMS -->
            <div class="form-box-items">
                <!-- FORM BOX ITEM -->
                <div class="form-box-item full">
                    <h4>Section cosplay</h4>
                    <hr class="line-separator">

                    <!-- INPUT CONTAINER -->
                    <div class="input-container">
                        <label for="skills" class="rl-label required">Mes compétences</label>
                        {{ Form::select('categories', $categories ,null,array('multiple'=>'multiple','name'=>'categories[]')) }}
                    </div>
                    <!-- /INPUT CONTAINER -->
                </div>
                <!-- /FORM BOX ITEM -->
            </div>
            <!-- /FORM BOX ITEMS -->

            <div class="form-box-items">
                <!-- FORM BOX ITEM -->
                <div class="form-box-item full">
                    <div>
                        <div class="clearfix"></div>
                        {{ Form::submit('Mettre à jour', ['class' => 'button big dark']) }}
                    </div>
                </div>
                <!-- /FORM BOX ITEM -->
            </div>
            {!! Form::close() !!}
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD BODY -->
@endsection
@push('javascripts')
    <script src="{{ asset('themes/dashboard/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            height : "250",
            menubar: false,
            selector: '.tinymce',
            plugins: [
                'image advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | ',
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'],
        });
    </script>
@endpush
