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
                <h4>Mes galeries</h4>
            </div>
            <!-- /HEADLINE -->

            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <p class="introduction-text">
                Bienvenue dans la section de votre portfolio !<br>
                Grâce aux galeries vous allez pouvoir exposer vos photos de cosplay, de WIP ou tout autre chose
                dans le domaine du cosplay :).
            </p>

            <!-- PRODUCT LIST -->
            <div class="product-list grid column4-wrap">
                <a href="{{ route('gallery_new') }}">
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
                            <p class="text-header">Ajouter une galerie</p>
                        </div>
                        <!-- /PRODUCT INFO -->
                    </div>
                </a>

                @if ($galleries)
                    @foreach($galleries as $gallery)
                        <!-- PRODUCT ITEM -->
                        <div class="product-item column">
                            @if($gallery->is_published)
                                <span class="pin primary">Publiée</span>
                            @endif
                            <!-- PRODUCT PREVIEW ACTIONS -->
                            <div class="product-preview-actions">
                                <!-- PRODUCT PREVIEW IMAGE -->
                                <figure class="product-preview-image">
                                    @if (isset($gallery->cover_image))
                                        <img src="{{ asset('storage/' . $gallery->cover_image) }}"
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
                                        <!-- DP TRIANGLE -->
                                        <div class="dp-triangle"></div>
                                        <!-- DP TRIANGLE -->
                                        <a href="{{ route('gallery_display_photos', $gallery->slug)}}">
                                            Ajouter des images
                                        </a>
                                        <a href="{{ route('gallery_edit', $gallery->slug)}}">
                                            Modifier
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="{{ route('gallery_delete', $gallery->slug) }}">
                                            Supprimer
                                        </a>
                                    </li>
                                </ul>
                                <!-- /DROPDOWN -->
                            </div>
                            <!-- /PRODUCT PREVIEW ACTIONS -->

                            <!-- PRODUCT INFO -->
                            <div class="product-info">
                                <a href="{{ route('gallery_edit', $gallery->slug)}}">
                                    <p class="text-header">{{ $gallery->title }}</p>
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
