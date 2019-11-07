@extends('layout.layout_dashboard')

@section('content')
    <div class="row">
        <!-- Listings -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                @include('elements.blocs.listeo_notifications')
                <h4>@lang("Mes cours")</h4>
                @if(count($courses) > 0)
                    <ul>
                        @foreach($courses as $course)
                        <li>
                            <div class="list-box-listing">
                                <div class="list-box-listing-img">
                                    <a href="#">
                                        @if($course->thumbnail_picture)
                                            <img src="{{ asset('storage/' . $course->thumbnail_picture) }}"  alt="">
                                        @else
                                            <img src="{{ asset('images/default-thumbnails.png') }}>">
                                        @endif
                                    </a>
                                </div>
                                <div class="list-box-listing-content">
                                    <div class="inner">
                                        <h3><a href="#">{{ $course->title }}</a></h3>
                                        <span>{{ $course->category->name }}</span>
                                        <div class="star-rating" data-rating="{{ $course->reviews->avg('nb_stars') }}">
                                            <div class="rating-counter">({{ $course->reviews->count() }})</div>
                                            <a href="#small-dialog" class="popup-with-zoom-anim">
                                                @lang("Voir les avis")
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-to-right">
                                <a href="{{ route('professor_course_edit', $course) }}" class="button gray"><i class="sl sl-icon-note"></i> @lang("Modifier")</a>
                                <a href="{{ route('professor_course_remove', $course) }}" class="button gray"><i class="sl sl-icon-close"></i> @lang("Supprimer")</a>
                            </div>
                        </li>
                        <!-- Reply to review popup -->
                        <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                            <div class="small-dialog-header">
                                <h3>Send Message</h3>
                            </div>
                            <div class="message-reply margin-top-0">
                                <textarea cols="40" rows="3" placeholder="Your Message to Kathy"></textarea>
                                <button class="button">Send</button>
                            </div>
                        </div>
                        @endforeach
                    </ul>
                @else
                    <div class="notification closeable margin-bottom-30">
                        <p>@lang("Vous n'avez encore créé aucun cours, lancez-vous !"). <b><a href="#">@lang("Créer un cours")</a></b> </p>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <nav>
                        {{ $courses->links('vendor.pagination.default') }}
                    </nav>
                </div>
            </div>
        </div>


        <!-- Copyrights -->
        @include('elements.blocs.dashboard-footer')
    </div>
@endsection
