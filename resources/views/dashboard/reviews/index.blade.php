@extends('layout.layout_dashboard')

@section('content')
    <div class="row">
        <!-- Listings -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4>{{ $title }}</h4>
                <ul>
                    <li>
                        <div class="comments listing-reviews">
                            <ul>
                                @if($reviews->count() > 0)
                                    @foreach($reviews as $review)
                                        <li>
                                            <div class="avatar">
                                                @if($review->author->avatar)
                                                    <img src="{{ asset('storage/' . $review->author->avatar) }}" alt="" />
                                                @else
                                                    <img src="{{ asset('themes/frontend/images/users/default.jpg') }}" alt="" />
                                                @endif
                                            </div>
                                            <div class="comment-content"><div class="arrow-comment"></div>
                                                <div class="comment-by">{{ $review->author->name }}
                                                    <span class="date">{{ \Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('d/m/Y') }} à {{ \Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('H:i') }}</span>
                                                    <div class="star-rating" data-rating="{{ $review->nb_stars }}"></div>
                                                </div>
                                                <p>
                                                    @if($review->reviewable_type == "App\Models\Course")
                                                        <a href="{{ route('course_details', ['course' => $review->reviewable]) }}" target="_blank">Voir le contenu concerné - {{ $review->reviewable->title }}</a></p>
                                                    @elseif($review->reviewable_type == "App\Models\Tutorial")
                                                        <a href="{{ route('tutorial_details', ['tutorial' => $review->reviewable]) }}" target="_blank">Voir le contenu concerné - {{ $review->reviewable->title }}</a></p>
                                                    @endif
                                                <p>{{ $review->content }}</p>
                                                <a href="#" class="rate-review"><i class="fa fa-heart"></i> J'aime !</a>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <p>{{ $alert }}</p>
                                @endif
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Copyrights -->
        @include('elements.blocs.dashboard-footer')
    </div>
@endsection
