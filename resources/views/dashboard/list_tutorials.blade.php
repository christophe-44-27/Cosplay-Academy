@extends('layout_dashboard')
@push('stylesheets')
    <style>
        .product-item{
            min-height: 306px;
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
                <h4>Mes tutoriels</h4>
            </div>
            <!-- /HEADLINE -->

            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <!-- PRODUCT LIST -->
            <div class="product-list grid column4-wrap">
                <a href="{{ route('tutorial_new') }}">
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
                            <p class="text-header">Publier un tutoriel</p>
                        </div>
                        <!-- /PRODUCT INFO -->
                    </div>
                </a>

                @if ($tutorials)
                    @foreach($tutorials as $tutorial)
                        <!-- PRODUCT ITEM -->
                        <div class="product-item column">
                            @if($tutorial->is_published)
                                <span class="pin primary">Publié</span>
                            @endif
                            <!-- PRODUCT PREVIEW ACTIONS -->
                            <div class="product-preview-actions">
                                <!-- PRODUCT PREVIEW IMAGE -->
                                <figure class="product-preview-image">
                                    @if (isset($tutorial->thumbnail_picture))
                                        <img src="{{ asset('storage/' . $tutorial->thumbnail_picture) }}"
                                             alt="product-image">
                                    @else
                                        <img src="{{ asset('images/structure/default-cover-cours-fr.png') }}"
                                             alt="Course image">
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
                                        <a href="{{ route('tutorial_edit', $tutorial->slug)}}">
                                            Modifier
                                        </a>
                                        @if($tutorial->is_published)
                                            <a href="{{ route('tutorial_unpublish', $tutorial->id)}}">
                                                Dépublier
                                            </a>
                                        @else
                                            <a href="{{ route('tutorial_publish', $tutorial->id)}}">
                                                Publier
                                            </a>
                                        @endif
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="{{ route('tutorial_remove', $tutorial->slug) }}">
                                            Supprimer
                                        </a>
                                    </li>
                                </ul>
                                <!-- /DROPDOWN -->
                            </div>
                            <!-- /PRODUCT PREVIEW ACTIONS -->

                            <!-- PRODUCT INFO -->
                            <div class="product-info">
                                <a href="{{ route('tutorial_edit', $tutorial->slug)}}">
                                    <p class="text-header">{{ $tutorial->title }}</p>
                                </a>
                                <br>
                                <a href="#">
                                    <p class="category primary">{{ $tutorial->tutorialCategory->name }}</p>
                                </a>
                            </div>
                            <!-- /PRODUCT INFO -->
                            <hr class="line-separator">

                            <!-- USER RATING -->
                            <div class="user-rating">
                                <a href="#">
                                    <figure class="user-avatar small">
                                        @if($tutorial->user->profile_picture)
                                            <img src="{{ asset('storage/' . $tutorial->user->profile_picture) }}"
                                                 alt="user-avatar">
                                        @else
                                            <img src="{{ asset('themes/dashboard/images/structure/default-avatar.png') }}"
                                                 alt="user-avatar">
                                        @endif
                                    </figure>
                                </a>
                                <a href="#">
                                    <p class="text-header tiny">{{ $tutorial->user->name }}</p>
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
