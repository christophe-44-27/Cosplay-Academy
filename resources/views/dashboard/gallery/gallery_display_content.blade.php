@extends('layout_dashboard')
@push('stylesheets')
    <style>
        .product-item{
            min-height: 306px;
        }
        .introduction-text{
            font-size: 20px;
        }
    </style>
@endpush
@section('content')
    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
    @include('partials/navigation/bloc_header_navigation_dashboard')

    <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline filter primary">
                <h4>Galerie <b>{{ $gallery->title }}</b></h4>
            </div>
            <!-- /HEADLINE -->

            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
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

            <p class="introduction-text">
                Vous pouvez ajouter des images dans cette galerie. Attention le poids de vos fichiers ne doit pas dépasser 2mo.
            </p>

            <!-- PRODUCT LIST -->
            <div class="product-list grid column4-wrap">
                <a href="#" data-toggle="modal" data-target="#addPhoto">
                    <div class="product-item upload-new column">
                        <!-- PRODUCT PREVIEW ACTIONS -->
                        <div class="product-preview-actions">
                            <!-- PRODUCT PREVIEW IMAGE -->
                            <figure class="product-preview-image">
                                <img src="{{ asset('themes/dashboard/images/dashboard/uploadnew-bg.jpg') }}"
                                     alt="product-image">
                            </figure>
                            <!-- /PRODUCT PREVIEW IMAGE -->
                        </div>
                        <!-- /PRODUCT PREVIEW ACTIONS -->

                        <!-- PRODUCT INFO -->
                        <div class="product-info">
                            <p class="text-header">Ajouter une image</p>
                        </div>
                        <!-- /PRODUCT INFO -->
                    </div>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="addPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Ajout d'une photo</h4>
                            </div>
                            {!! Form::open(['url' => route('gallery_add_photo', $gallery->slug), 'enctype' => "multipart/form-data"]) !!}
                            <div class="modal-body">
                                <!-- INPUT CONTAINER -->
                                <div class="input-container">
                                    <label for="image_path" class="rl-label required">Photo</label>
                                    <input id="image_path" type="file" name="image_path">
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <br>
                                <br>
                                <!-- INPUT CONTAINER -->
                                <div class="input-container half">
                                    <label for="title" class="rl-label required">Titre de la photo</label>
                                    {{ Form::text('title') }}
                                </div>
                                <!-- /INPUT CONTAINER -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            @if ($photos)
                @foreach($photos as $photo)
                    <!-- PRODUCT ITEM -->
                        <div class="product-item column">
                        <!-- PRODUCT PREVIEW ACTIONS -->
                            <div class="product-preview-actions">
                                <!-- PRODUCT PREVIEW IMAGE -->
                                <figure class="product-preview-image">
                                    @if (isset($photo->image_dashboard_path))
                                        <img src="{{ asset('storage/' . $photo->image_dashboard_path) }}"
                                             alt="product-image">
                                    @endif
                                </figure>
                                <!-- /PRODUCT PREVIEW IMAGE -->

                                <!-- PRODUCT SETTINGS -->
                                <div class="product-settings primary dropdown-handle">
                                    <span class="sl-icon icon-settings"></span>
                                </div>
                                <!-- /PRODUCT SETTINGS -->

                                <!-- DROPDOWN -->
                                <ul class="dropdown small hover-effect closed">
                                    <li class="dropdown-item">
                                        <a href="{{ route('community_gallery_delete_photo', [$photo->id, $gallery->slug]) }}">
                                            Supprimer
                                        </a>
                                    </li>
                                </ul>
                                <!-- /DROPDOWN -->
                            </div>
                            <!-- /PRODUCT PREVIEW ACTIONS -->

                            <!-- PRODUCT INFO -->
                            <div class="product-info">
                                <a href="#">
                                    <p class="text-header">{{ $photo->title }}</p>
                                </a>

                                <a href="#">
                                    <p class="category primary">{{ $gallery->galleryCategory->name }}</p>
                                </a>
                            </div>
                            <!-- /PRODUCT INFO -->
                            <hr class="line-separator">

                            <!-- USER RATING -->
                            <div class="user-rating">
                                <a href="#">
                                    <figure class="user-avatar small">
                                        @if($gallery->user->profile_picture)
                                            <img src="{{ asset('storage/' . $gallery->user->profile_picture) }}"
                                                 alt="user-avatar">
                                        @else
                                            <img src="{{ asset('themes/dashboard/images/structure/default-avatar.png') }}"
                                                 alt="user-avatar">
                                        @endif
                                    </figure>
                                </a>
                                <a href="#">
                                    <p class="text-header tiny">{{ $gallery->user->name }}</p>
                                </a>
                            </div>
                            <!-- /USER RATING -->
                        </div>
                        <!-- /PRODUCT ITEM -->
                    @endforeach
                @endif
            </div>
            <!-- /PRODUCT LIST -->

            <div class="clearfix"></div>
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD BODY -->
@endsection

@push('javascripts')
    <script>
        (function($) {
            var $dp_handle = $('.dropdown-handle');

            $dp_handle.on('click', toggleSettings);

            function toggleSettings() {
                var $this = $(this),
                    $dp = $this.siblings('.dropdown');

                if ($dp.hasClass('closed')) {
                    $dp.removeClass('closed');
                    $this.addClass('active');
                } else {
                    $dp.addClass('closed');
                    $this.removeClass('active');
                }
            }
        })(jQuery);
    </script>
@endpush
