@extends('layout.layout_dashboard')

@section('content')
    <div class="row">
        <!-- Listings -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4>Mes avis</h4>
                <ul>
                    <li>
                        <div class="comments listing-reviews">
                            <ul>
                                @if($reviews)
                                    @foreach($reviews as $review)
                                        <li>
                                            <div class="avatar"><img src="images/reviews-avatar.jpg" alt="" /> </div>
                                            <div class="comment-content"><div class="arrow-comment"></div>
                                                <div class="comment-by">Mes avis <div class="comment-by-listing own-comment">on <a href="#">Tom's Restaurant</a></div> <span class="date">May 2019</span>
                                                    <div class="star-rating" data-rating="{{ $review->nb_stars }}"></div>
                                                </div>
                                                <p>Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
                                                <a href="#" class="rate-review"><i class="sl sl-icon-note"></i> Edit</a>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <p>pas d'avis</p>
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
